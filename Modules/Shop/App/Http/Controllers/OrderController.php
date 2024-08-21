<?php

namespace Modules\Shop\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\CartItem;
use Modules\Shop\App\Models\Cities;
use Modules\Shop\App\Models\Product;
use Modules\Shop\App\Models\Provinces;
use Modules\Shop\Repositories\Front\Interfaces\AddressRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\CartRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\CategoryRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\OrderRepositoryInterface;

use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
    protected $addressRepository;
    protected $cartRepository;
    protected $categoryRepository;
    protected $orderRepository;

    public function __construct(AddressRepositoryInterface $addressRepository, CartRepositoryInterface $cartRepository, CategoryRepositoryInterface $categoryRepository, OrderRepositoryInterface $orderRepository)
    {
        $this->addressRepository = $addressRepository;
        $this->cartRepository = $cartRepository;
        $this->categoryRepository = $categoryRepository;
        $this->orderRepository = $orderRepository;
    }

    public function cart_info()
    {
        //membedakan cart berdasarkan user
        $this->data['cart'] = $this->cartRepository->findByUser(auth()->user());

        //ambil data cart item berdasarkan user yang sedang login
        $cart = Cart::where('user_id', auth()->id())->first();

        //hitung data cart item jika ada cart dari masing-masing user
        if ($cart) {
            $totalItems = $cart->items()->count();
        } else {
            $totalItems = 0;
        }
        $this->data['totalItems'] = $totalItems;
    }

    public function checkout()
    {
        $this->data['category'] = $this->categoryRepository->findAll();

        //membedakan alamat berdasarkan user
        $this->data['addresses'] = $this->addressRepository->findByUser(auth()->user());

        $this->data['province'] = Provinces::all()->pluck('province_name', 'province_id');
        $this->data['city'] = Cities::all()->pluck('city_name', 'city_id');
        $this->data['cart_info'] = $this->cart_info();

        if ($this->data['totalItems'] == 0) {
            return redirect()->route('carts.index');
        }

        return $this->loadTheme('orders.checkout', $this->data);
    }

    public function store(Request $request)
    {
        $address = $this->addressRepository->findByID($request->get('address_id'));
        $cart = $this->cartRepository->findByUser(auth()->user());
        $selectedShipping = $this->getSelectedShipping($request);

        if (!$address) {
            return back()->with('error', 'Harap Pilih Alamat Pengiriman');
        }

        if (!$selectedShipping) {
            return back()->with('error', 'Jasa Kirim Belum Dipilih');
        }
        
        DB::beginTransaction();
        try {
            $order = $this->orderRepository->create($request->user(), $cart, $address, $selectedShipping);
            foreach ($cart->items as $item) {
                $product = $item->product;
            
                if ($product->stock >= $item->quantity) {
                    $product->reduceInventory($item->quantity);
                } else {
                    return back()->with('error', 'Stock is insufficient for product: ' . $product->name);
                }
            }
            
            // dd($order->toArray());
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        $this->cartRepository->clear(auth()->user());

        return redirect($order->payment_url);
    }

    private function getSelectedShipping(Request $request)
    {
        $address = $this->addressRepository->findByID($request->get('address_id'));
        $cart = $this->cartRepository->findByUser(auth()->user());

        $availableServices = $this->calculateShippingFee($cart, $address, $request->get('courier'));

        $selectedPackage = null;
        if (!empty($availableServices)) {
            foreach ($availableServices as $service) {
                if ($service['service'] === $request->get('delivery_package')) {
                    $selectedPackage = $service;
                    continue;
                }
            }
        }

        if ($selectedPackage == null) {
            return [];
        }

        return [
            'delivery_package' => $request->get('delivery_package'),
            'courier' => $request->get('courier'),
            'shipping_fee' => $selectedPackage['cost'],
        ];
    }

    public function shippingFee(Request $request)
    {
        $address = $this->addressRepository->findByID($request->get('address_id'));
        $cart = $this->cartRepository->findByUser(auth()->user());

        $availableServices = $this->calculateShippingFee($cart, $address, $request->get('courier'));
        return $this->loadTheme('orders.available_service', ['services' => $availableServices]);
    }

    public function choosePackage(Request $request)
    {
        $address = $this->addressRepository->findByID($request->get('address_id'));
        $cart = $this->cartRepository->findByUser(auth()->user());

        $availableServices = $this->calculateShippingFee($cart, $address, $request->get('courier'));

        $selectedPackage = null;
        if (!empty($availableServices)) {
            foreach ($availableServices as $service) {
                if ($service['service'] === $request->get('delivery_package')) {
                    $selectedPackage = $service;
                    continue;
                }
            }
        }

        // if ($selectedPackage == null) {
        //     return [];
        // }

        if ($selectedPackage['cost'] >= 1000000) {
            $packageCost = floatval($selectedPackage['cost']) * 1000000;
        } elseif ($selectedPackage['cost'] < 1000000) {
            $packageCost = floatval($selectedPackage['cost']) * 1000;
        } elseif ($selectedPackage == null) {
            return [];
        }

        return [
            'shipping_fee' => number_format($packageCost, 2, ',', '.'),
            'grand_total' => number_format($cart->grand_total + $packageCost, 2, ',', '.'),
        ];
    }

    public function calculateShippingFee($cart, $address, $courier)
    {
        $shippingFees = [];

        try {
            $response = Http::withHeaders([
                'key' => env('API_ONGKIR_KEY'),
            ])->post(env('API_ONGKIR_BASE_URL') . '/cost', [
                'origin' => env('API_ONGKIR_ORIGIN'),
                'destination' => $address->city,
                'weight' => $cart->total_weight,
                'courier' => $courier,
            ]);

            $shippingFees = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [];
        }
        // dd($shippingFees);

        $availableServices = [];
        if (!empty($shippingFees['rajaongkir']['results'])) {
            foreach ($shippingFees['rajaongkir']['results'] as $cost) {
                if (!empty($cost['costs'])) {
                    foreach ($cost['costs'] as $costDetail) {
                        $availableServices[] = [
                            'service' => $costDetail['service'],
                            'description' => $costDetail['description'],
                            'etd' => $costDetail['cost'][0]['etd'],
                            'cost' => number_format($costDetail['cost'][0]['value'], 0, ',', '.'),
                            'courier' => $courier,
                            'address_id' => $address->id,
                        ];
                    }
                }
            }
        }
        // dd($availableServices);

        return $availableServices;
    }

    public function simpanAlamat(Request $request)
    {
        $this->addressRepository->addAddress($request);
        return redirect()->route('orders.checkout')->with('success', 'Alamat berhasil ditambah.');
    }

    public function hapusAlamat($id)
    {
        $this->addressRepository->removeAddress($id);
        return redirect()->route('orders.checkout')->with('success', 'Alamat berhasil dihapus');
    }
}
