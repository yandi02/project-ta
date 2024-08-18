<?php

namespace Modules\Shop\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\Product;
use Modules\Shop\App\Models\ProductInventory;
use Modules\Shop\Repositories\Front\Interfaces\ProductRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\CategoryRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\TagRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $tagRepository;
    protected $defaultPriceRange;
    protected $sortingQuery;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, TagRepositoryInterface $tagRepository)
    {
        parent::__construct();

        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->defaultPriceRange = [
            'min' => 8000,
            'max' => 50000,
        ];

        $this->data['categories'] = $this->categoryRepository->findAll();
        $this->data['filter']['price'] = $this->defaultPriceRange;

        $this->sortingQuery = null;
        $this->data['sortingQuery'] = $this->sortingQuery;
        $this->data['sortingOptions'] = [
            '' => '--- Sortir Produk ---',
            '?sort=price&order=asc' => 'Harga: Rendah ke Tinggi',
            '?sort=price&order=desc' => 'Harga: Tinggi ke Rendah',
            '?sort=sale_price&order=desc' => 'Harga: Diskon',
            '?sort=publish_date&order=desc' => 'Produk: Terbaru',
            '?sort=manage_stock&order=desc' => 'Produk: Tersedia',
            '?sort=manage_stock&order=asc' => 'Produk: Kosong',
        ];
    }
    /**
     * Display a listing of the resource.
     */

    public function cart_info(){
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

    public function index(Request $request)
    {
        $priceFilter = $this->getPriceRangeFilter($request);

        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'price' => $priceFilter,
            ],
        ];

        if ($request->get('price')) {
            $this->data['filter']['price'] = $priceFilter;
        }

        if ($request->get('sort')) {
            $sort = $this->sortingRequest($request);
            $options['sort'] = $sort;

            $this->sortingQuery = '?sort=' . $sort['sort'] . '&order=' . $sort['order'];

            $this->data['sortingQuery'] = $this->sortingQuery;
        }

        $this->data['products'] = $this->productRepository->findAll($options);
        $this->data['cart_info'] = $this->cart_info();

        return $this->loadTheme('products.index', $this->data);
    }

    public function search(Request $request)
    {
        $this->data['products'] = Product::where('name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('excerpt', 'LIKE', '%' . $request->search . '%')
            ->get();

        $this->data['cart_info'] = $this->cart_info();

        return $this->loadTheme('products.search', $this->data);
    }

    public function category($categorySlug, Request $request)
    {
        $this->data['category'] = $this->categoryRepository->findBySlug($categorySlug);

        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'category' => $categorySlug,
            ]
        ];

        if ($request->get('sort')) {
            $sort = $this->sortingRequest($request);
            $options['sort'] = $sort;

            $this->sortingQuery = '?sort=' . $sort['sort'] . '&order=' . $sort['order'];

            $this->data['sortingQuery'] = $this->sortingQuery;
        }

        $this->data['products'] = $this->productRepository->findAll($options);
        $this->data['cart_info'] = $this->cart_info();

        return $this->loadTheme('products.category', $this->data);
    }

    public function tag($tagSlug)
    {
        $tag = $this->tagRepository->findBySlug($tagSlug);

        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'tag' => $tagSlug,
            ]
        ];

        $this->data['products'] = $this->productRepository->findAll($options);
        $this->data['tag'] = $tag;

        return $this->loadTheme('products.tag', $this->data);
    }

    public function show($categorySlug, $productSlug)
    {
        $sku = Arr::last(explode('-', $productSlug));

        $cart = Cart::where('user_id', auth()->id())->first();

        if ($cart) {
            $totalItems = $cart->items()->count();
        } else {
            $totalItems = 0;
        }

        $this->data['product'] = $this->productRepository->findBySKU($sku);
        $this->data['totalItems'] = $totalItems;
        // dd($this->data['product']);

        return $this->loadTheme('products.detail', $this->data);
    }

    public function getPriceRangeFilter($request)
    {
        if (!$request->get('price')) {
            return [];
        }

        $prices = explode(' - ', $request->get('price'));

        if (count($prices) < 0) {
            return $this->defaultPriceRange;
        }

        return [
            'min' => (int) $prices[0],
            'max' => (int) $prices[1],
        ];
    }

    function sortingRequest(Request $request)
    {
        $sort = [];

        if ($request->get('sort') && $request->get('order')) {
            $sort = [
                'sort' => $request->get('sort'),
                'order' => $request->get('order'),
            ];
        } elseif ($request->get('sort')) {
            $sort = [
                'sort' => $request->get('sort'),
                'order' => 'desc',
            ];
        }

        return $sort;
    }
}
