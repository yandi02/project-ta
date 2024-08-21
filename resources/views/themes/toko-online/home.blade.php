@extends('themes.toko-online.layouts.app')

@section('title')
    Beranda
@endsection

@section('content')
    <section>
        <div class="container mb-5">
            {{-- @if (auth()->user())
                <div>
                    <h1 class="display-6 text-center mb-4">Selamat datang, {{ auth()->user()->name }}!</h1>
                </div>
            @endif --}}
            <div class="row align-items-center mb-4">
                <div class="col-6">
                    <h1 class="display-6">Produk Best Seller</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($featured_products as $index => $featured_product)
                    @if ($index == 0)
                        <div class="col-lg-7 px-2">
                            <div class="product-container">
                                <a href="{{ shop_product_link($featured_product) }}">
                                    <img src="{{ asset('storage/img/' . $featured_product->featured_image) }}"
                                    class="d-block w-100 product-image" alt="Product 1" height="608px">
                                <div class="product-info1">
                                    <h3>{{ $featured_product->name }}</h3>
                                    <p>{{ $featured_product->excerpt }}</p>
                                </div>
                                </a>
                            </div>
                        </div>
                    @elseif($index == 1)
                        <div class="col-lg-5 px-0">
                            <div class="row pb-2">
                                <div class="product-container">
                                    <a href="{{ shop_product_link($featured_product) }}">
                                        <img src="{{ asset('storage/img/' . $featured_product->featured_image) }}"
                                            alt="{{ $featured_product->name }}" class="product-image"
                                            style="width: 100%; height: 300px;">
                                        <div class="product-info2">
                                            <h4>{{ $featured_product->name }}</h4>
                                            <p>{{ $featured_product->excerpt }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    @else
                            <div class="row pb-2">
                                <div class="product-container">
                                    <a href="{{ shop_product_link($featured_product) }}">
                                        <img src="{{ asset('storage/img/' . $featured_product->featured_image) }}"
                                            alt="{{ $featured_product->name }}" class="product-image"
                                            style="width: 100%; height: 300px;">
                                        <div class="product-info2">
                                            <h4>{{ $featured_product->name }}</h4>
                                            <p>{{ $featured_product->excerpt }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular -->
    <section class="popular">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="display-6">Produk dan Stok Terbaru</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('products.index') }}" class="btn-first p-2">View All</a>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-6">
                        <div class="card card-product card-body p-lg-4 p3">
                            <div class="img-container">
                                <a href="{{ shop_product_link($product) }}">
                                    @if ($product->featured_image)
                                        <img src="{{ asset('storage/img/' . $product->featured_image) }}" alt="Foto Produk"
                                            class="img-fluid">
                                    @elseif ($product->featured_image == null)
                                        <img src="https://via.placeholder.com/600x800?text=Foto+Produk" alt=""
                                            class="img-fluid">
                                    @endif
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 discount-label text-end">
                                    @if ($product->hasSalePrice)
                                        <small class="discount-percent ms-4 amount">
                                            Diskon {{ $product->discount_percent }}%
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <h3 class="product-name mt-3">
                                <div class="col-sm-12">
                                    <a href="{{ shop_product_link($product) }}">{{ $product->name }}</a>
                                </div>
                            </h3>
                            <div class="detail justify-content-between align-items-center mt-2">
                                <div class="row">
                                    <div class="col-sm-8">
                                        @if ($product->hasSalePrice)
                                            <p class="price text-danger" style="margin-bottom: -10px">
                                                {{ $product->sale_price_label }}</p>
                                            <p class="text-decoration-line-through text-muted" style="margin-bottom: -6px">
                                                {{ $product->price_label }}</p>
                                        @else
                                            <p class="price mb-0">{{ $product->price_label }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{ route('carts.store') }}" class="btn-cart"><i
                                                class="bx bx-cart-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Latest -->
    <section class="latest">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="display-6">Produk Lainnya</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('products.index') }}" class="btn-first p-2">View All</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-3 col-6">
                    <div class="card card-product card-body p-lg-4 p3">
                        <a href="product.html"><img src="https://via.placeholder.com/600x800?text=Foto+Produk"
                                alt="" class="img-fluid"></a>
                        <h3 class="product-name mt-3">Product 1</h3>
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                        </div>
                        <div class="detail d-flex justify-content-between align-items-center mt-4">
                            <p class="price">IDR 200.000</p>
                            <a href="product.html" class="btn-cart"><i class="bx bx-cart-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card card-product card-body p-lg-4 p3">
                        <a href="product.html"><img src="https://via.placeholder.com/600x800?text=Foto+Produk"
                                alt="" class="img-fluid"></a>
                        <h3 class="product-name mt-3">Product 2</h3>
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                        </div>
                        <div class="detail d-flex justify-content-between align-items-center mt-4">
                            <p class="price">IDR 200.000</p>
                            <a href="product.html" class="btn-cart"><i class="bx bx-cart-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3 mt-lg-0">
                    <div class="card card-product card-body p-lg-4 p3">
                        <a href="product.html"><img src="https://via.placeholder.com/600x800?text=Foto+Produk"
                                alt="" class="img-fluid"></a>
                        <h3 class="product-name mt-3">Product 3</h3>
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                        </div>
                        <div class="detail d-flex justify-content-between align-items-center mt-4">
                            <p class="price">IDR 200.000</p>
                            <a href="product.html" class="btn-cart"><i class="bx bx-cart-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3 mt-lg-0">
                    <div class="card card-product card-body p-lg-4 p3">
                        <a href="product.html"><img src="https://via.placeholder.com/600x800?text=Foto+Produk"
                                alt="" class="img-fluid"></a>
                        <h3 class="product-name mt-3">Product 4</h3>
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                        </div>
                        <div class="detail d-flex justify-content-between align-items-center mt-4">
                            <p class="price">IDR 200.000</p>
                            <a href="product.html" class="btn-cart"><i class="bx bx-cart-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe  -->
    {{-- <section class="subscribe">
        <div class="container">
            <div class="subscribe-wrapper">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6 col-md-7 col-10 col-sub">
                        <h1>Subscribe to get latest updates!</h1>
                        <form action="#" class="mt-5">
                            <div class="input-group w-100">
                                <input type="email" class="form-control" placeholder="Type your email ..">
                                <button class="btn btn-outline-danger">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
