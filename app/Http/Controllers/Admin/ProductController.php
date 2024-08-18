<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\Product;
use Modules\Shop\Repositories\Front\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->data['no'] = 1;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['users'] = $this->productRepository->findUser();
        $this->data['category'] = $this->productRepository->findCategory();

        if (auth()->user()) {
            if (auth()->user()->level == 1) {
                return view('admin.products.index', $this->data);
            } else {
                return redirect()->route('home');
            }
        }

        return view('auth.login');
    }

    // public function tambah(){
    //     $this->data['category'] = $this->productRepository->findCategory();
    //     return view('tes.pages.product.index', $this->data);
    // }

    public function data()
    {
        $product = $this->productRepository->findAll();

        return datatables()
            ->of($product)
            ->addIndexColumn()
            ->addColumn('select_all', function ($product) {
                return '
                    <input type="checkbox" name="id[]" value="' . $product->id . '">
                ';
            })
            ->addColumn('featured_image', function ($product) {
                $imageUrl = asset('storage/img/' . $product->featured_image);

                if ($product->featured_image) {
                    return '<img src="' . $imageUrl . '" width="120px" height="70px">';
                }
                return '<img src="https://via.placeholder.com/600x400?text=Foto+Produk" width="120px">';
            })
            ->addColumn('sku', function ($product) {
                return '<span class="badge bg-danger text-light fs-3">' . $product->sku . '</span>';
            })
            ->addColumn('price', function ($product) {
                return 'Rp. ' . number_format($product->price, 2, ',', '.');
            })
            ->addColumn('sale_price', function ($product) {
                return 'Rp. ' . number_format($product->sale_price, 2, ',', '.');
            })
            ->addColumn('weight', function ($product) {
                return $product->weight . 'gr';
            })
            ->addColumn('stock', function ($product) {
                return $product->stock;
            })
            ->addColumn('aksi', function ($product) {
                return '
                    <div class="btn-group">
                        <button type="button" onclick="window.location.href=`' . route('product.edit', $product->id) . '`" class="btn btn-sm btn-outline-info">Ubah</button>
                        <button type="button" onclick="deleteData(`' . route('product.destroy', $product->id) . '`)" class="btn btn-sm btn-outline-danger">Hapus</button>
                    </div>
                ';
            })
            ->rawColumns(['select_all', 'featured_image', 'sku', 'price', 'sale_price', 'stock', 'aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['category'] = $this->productRepository->findCategory();
        return view('admin.products.tambah', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required',
            // 'user_id' => 'required',
            'category' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            // 'stock' => 'required|numeric',
            // 'stock_status' => 'required',
            'description' => 'required',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->productRepository->insertData($request);

        return response()->json('Data berhasil disimpan', 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->productRepository->findByID($id);

        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['product'] = Product::find($id);
        $this->data['categories'] = $this->productRepository->findCategory();
        return view('admin.products.ubah', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all(), $id);
        $request->validate([
            'sku' => 'required',
            // 'user_id' => 'required',
            'category' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            // 'stock' => 'required|numeric',
            // 'stock_status' => 'required',
            'description' => 'required',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->productRepository->updateData($request, $id);

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productRepository->deleteData($id);

        return response(null, 204);
    }
}
