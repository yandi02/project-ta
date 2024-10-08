@extends('themes.toko-online.layouts.app')

@section('title')
    Kategori
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('category.index') }}">Produk</a></li>
    <li class="breadcrumb-item active" style="text-decoration: none">Pencarian</li>
    <li class="breadcrumb-item active" style="text-decoration: none">{!! ucwords(request('search')) !!}</li>
@endsection

@section('content')
    <section class="main-content">
        <div class="container">
            <div class="row">
                <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
                    @include('themes.toko-online.products.sidebar', ['categories' => $categories])
                </aside>
                <section class="col-lg-9 col-md-12 products">
                    <div class="card bg-warning-subtle shadow-none border-0 position-relative overflow-hidden mb-3">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h2 class="fw-semibold mb-8">Cari : {{ ucwords(request('search')) }}</h2>
                                </div>
                                <div class="col-3">
                                    <div class="text-center">
                                        <img width="100" src="{{ asset('modernize2/images/package.png') }}"
                                            alt="modernize-img" class="img-fluid ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-lg-0">
                                <span class="fw-semibold">{{ $products->count() }} Total Produk Ditampilkan</span>
                            </div>
                            <div class="d-flex mt-lg-0">
                                {{-- <div class="me-2 flex-grow-1">
                                    <!-- select option -->
                                    <select class="form-select">
                                        <option selected="">Show: 50</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div> --}}
                                {{-- <div>
                                    {!! html()->select('sorting', $sortingOptions, $sortingQuery)->class(['form-select'])->attribute(
                                            'onchange',
                                            'this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);',
                                        ) !!}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($products as $product)
                            @include('themes.toko-online.products.product-box', ['product' => $product])
                        @empty
                            <h1 class="text-danger text-center" style="margin-top: 240px; margin-bottom: 240px">Produk tidak ditemukan</h1>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
