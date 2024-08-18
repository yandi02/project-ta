<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Order;
use Modules\Shop\App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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

    public function index()
    {
        $this->data['product'] = Product::count();
        $this->data['category'] = Category::count();
        $this->data['user'] = User::where('level', 0)->count();
        $this->data['order'] = Order::count();

        $this->data['products'] = Product::orderBy('publish_date', 'desc')->paginate(4);
        $this->data['cart_info'] = $this->cart_info();
        $this->data['featured_products'] = Product::latest()->limit(3)->get();

        if (auth()->user()) {
            if (auth()->user()->level == 1) {
                return view('admin.dashboard.index', $this->data);
            } else {
                return view('themes.toko-online.home', $this->data);
            }
        }
        
        return view('themes.toko-online.home', $this->data);
    }

    public function toko()
    {
        $this->data['cart_info'] = $this->cart_info();

        $this->data['products'] = Product::orderBy('publish_date', 'desc')->paginate(4);
        $this->data['featured_products'] = Product::latest()->limit(3)->get();

        return view('themes.toko-online.home', $this->data);
    }
}
