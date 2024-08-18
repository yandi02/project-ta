<div class="col-lg-4 col-6">
    <div class="card card-product card-body p-lg-4 p3">
        <div class="img-container">
            <a href="{{ shop_product_link($product) }}">
                @if ($product->featured_image)
                    <img src="{{ asset('storage/img/' . $product->featured_image) }}" alt="Foto Produk" class="img-fluid">
                @elseif ($product->featured_image == null)
                    <img src="https://via.placeholder.com/600x800?text=Foto+Produk" alt="" class="img-fluid">
                @endif
                {{-- <img src="https://via.placeholder.com/600x800?text=Foto+Produk" alt="" class="img-fluid"> --}}
            </a>
        </div>
        <div class="row">
            <div class="col-sm-12 discount-label text-end">
                @if ($product->hasSalePrice)
                    <small class="discount-percent ms-4 amount">
                        Diskon {{ $product->discount_percent }}%
                        {{-- Diskon 50% --}}
                    </small>
                @endif
            </div>
        </div>
        <h3 class="product-name mt-3">
            <div class="col-sm-12">
                <a href="{{ shop_product_link($product) }}">{{ $product->name }}</a>
                {{-- <a href="{{ shop_product_link($product) }}">Nama Produk</a> --}}
            </div>
        </h3>
        {{-- <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
        </div> --}}
        <div class="detail justify-content-between align-items-center mt-2">
            <div class="row">
                <div class="col-sm-9">
                    @if ($product->hasSalePrice)
                        <p class="price text-danger" style="margin-bottom: -10px">{{ $product->sale_price_label }}</p>
                        <p class="text-decoration-line-through text-muted" style="margin-bottom: -6px">
                            {{ $product->price_label }}</p>
                    @else
                        <p class="price mb-0">{{ $product->price_label }}</p>
                    @endif
                </div>
                <div class="col-sm-3">
                    <a href="{{ route('carts.store') }}" class="btn-cart"><i class="bx bx-cart-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
