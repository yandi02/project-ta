@extends('themes.toko-online.layouts.app')

@section('content')
    <section class="main-content">
        <div class="container">
            <div class="row" style="margin-top: 150px">
                <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
                    @include('themes.toko-online.products.sidebar', ['categories' => $categories])
                </aside>
                <section class="col-lg-9 col-md-12 products">
                    <div class="row">
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-lg-0">
                                <h2 class="mb-0">Tag : {{ $tag->name }}</h2>
                            </div>
                            <div class="d-flex mt-2 mt-lg-0">
                                <div class="me-2 flex-grow-1">
                                    <!-- select option -->
                                    <select class="form-select">
                                        <option selected="">Show: 50</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                                <div>
                                    <!-- select option -->
                                    <select class="form-select">
                                        <option selected="">Sort by: Featured</option>
                                        <option value="Low to High">Price: Low to High</option>
                                        <option value="High to Low"> Price: High to Low</option>
                                        <option value="Release Date"> Release Date</option>
                                        <option value="Avg. Rating"> Avg. Rating</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($products as $product)
                            @include('themes.toko-online.products.product-box', ['product' => $product])
                        @empty
                            <p class="text-danger">Produk Kosong</p>
                        @endforelse

                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            {!! $products->links() !!}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
