@extends('themes.toko-online.layouts.app')

@section('title')
    Produk
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('products.index') }}">Produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">{!! $product->name !!}</li>
@endsection

@section('content')
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @if ($product->featured_image)
                        <img src="{{ asset('storage/img/' . $product->featured_image) }}" width="500" height="540"
                            alt="Product 1">
                    @elseif ($product->featured_image == null)
                        <img src="https://via.placeholder.com/600x800?text=Foto+Produk" alt="" class="img-fluid">
                    @endif
                    {{-- <img src="https://via.placeholder.com/500x700?text=Foto+Produk" width="500" height="540"
                        alt="Product 1"> --}}
                </div>
                <div class="col-md-6">
                    <div class="product-detail mt-6 mt-md-0">
                        <div class="fs-1 fw-bolder">
                            {{-- @if ($product->hasSalePrice)
                            {{ $product->name }}
                            <small class=" ms-2 text-danger">{{ $product->discount_percent }}%
                                Off</small>
                            @else
                            {{ $product->name }}
                            @endif --}}
                            {{ $product->name }}
                        </div>
                        <div class="price mb-2 ">
                            @if ($product->hasSalePrice)
                                <span class="active-price text-danger">{{ $product->sale_price_label }}</span>
                                <span
                                    class="text-decoration-line-through text-muted ms-1 fs-6">{{ $product->price_label }}</span>
                                <small class=" ms-2 text-danger">Diskon {{ $product->discount_percent }}%</small>
                            @else
                                <span class="active-price text-dark">{{ $product->price_label }}</span>
                            @endif
                        </div>
                        {{-- <div class="rating">
                            <small class="text-warning">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star-half"></i>
                            </small>
                            <a href="#" class="ms-2">(30 reviews)</a>
                        </div> --}}

                        <hr class="my-6">
                        <div class="product-select mt-3 row justify-content-start g-2 align-items-center">
                            {{ html()->form('post', route('carts.store'))->open() }}
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="row">
                                <div class="col-md-2 col-3">
                                    <input type="number" name="qty" value="1" class="form-control"
                                        min="1" />
                                </div>
                                <div class="col-xxl-6 col-lg-6 col-md-6 col-6 d-grid">
                                    <button type="submit" class="btn btn-add-cart"><i class="bx bx-cart-alt"></i> Tambah
                                        ke Keranjang</button>
                                </div>
                                {{-- <div class="col-md-4 col-4 align-item-end">
                                    <a class="btn btn-light" href="shop-wishlist.html" data-bs-toggle="tooltip"
                                        data-bs-html="true" aria-label="Wishlist"><i class="bx bx-heart"></i></a>
                                </div> --}}
                            </div>
                            {{ html()->form()->close() }}
                            @include('themes.toko-online.shared.flash_message')
                        </div>
                        <hr class="my-6">
                        <div class="product-info">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td width="10%">SKU:</td>
                                        <td>{{ $product->sku }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok:</td>
                                        <td>{{ $product->stock_status_label }} ({{ $product->stock }})</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori:</td>
                                        <td>{{ $product->category_name }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>Shipping:</td>
                                        <td><small>01 day shipping.<span class="text-muted"> (Free pickup
                                                    today)</span></small></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <p>{!! $product->excerpt !!}</p>
                        <hr class="my-6">
                        <div class="product-share">
                            <ul>
                                <li><a href="#"><i class="bx bxl-instagram ig"></i></a></li>
                                <li><a href="#"><i class="bx bxl-whatsapp wa"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row mt-0">
                <div class="product-description pt-5">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-product-details-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-product-details" type="button" role="tab"
                                aria-controls="nav-product-details" aria-selected="true">Detail</button>
                            <button class="nav-link" id="nav-product-reviews-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-product-reviews" type="button" role="tab"
                                aria-controls="nav-product-reviews" aria-selected="false">Komentar</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-3" id="nav-product-details" role="tabpanel"
                            aria-labelledby="nav-product-details-tab">
                            <div class="my-8">
                                <p>{!! $product->body !!}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade p-3" id="nav-product-reviews" role="tabpanel"
                            aria-labelledby="nav-product-reviews-tab">
                            <div class="review-form">
                                <h3>Tambahkan Komentar</h3>
                                <form>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Komentar</label>
                                        <textarea cols="4" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection
