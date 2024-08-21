@extends('themes.toko-online.layouts.app')

@section('title')
    Keranjang
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('carts.index') }}">Keranjang Belanja</a></li>
@endsection

@section('content')
    <section class="main-content">
        <div class="container">
            <div class="row">
                <section class="col-lg-12 col-md-12 shopping-cart">
                    {{-- <div class="card mb-4 bg-light border-0 section-header">
                        <div class="card-body p-5">
                            <h2 class="mb-0">
                                Keranjang Belanja
                                @if ($totalItems > 0)
                                    ({{ $totalItems }} Produk)
                                @else
                                    <span></span>
                                @endif
                            </h2>
                        </div>
                    </div> --}}
                    <div class="card bg-warning-subtle shadow-none border-0 position-relative overflow-hidden mb-4">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h2 class="mb-0 fw-semibold">
                                        Keranjang Belanja
                                        @if ($totalItems > 0)
                                            ({{ $totalItems }} Produk)
                                        @else
                                            <span></span>
                                        @endif
                                    </h2>
                                </div>
                                <div class="col-3">
                                    <div class="text-center">
                                        <img width="100" src="{{ asset('modernize2/images/shopping-cart.png') }}"
                                            alt="modernize-img" class="img-fluid ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            {{ html()->form('PUT', route('carts.update'))->id('cart-list')->open() }}
                            <ul class="list-group list-group-flush">
                                @forelse ($cart->items as $item)
                                    <li class="list-group-item py-3 border-top">
                                        <div class="row align-items-center">
                                            <div class="col-6 col-md-6 col-lg-7">
                                                <div class="d-flex">
                                                    @if ($item->product->featured_image)
                                                        <img src="{{ asset('storage/img/' . $item->product->featured_image) }}"
                                                            alt="Ecommerce" style="width:80px;height: 80px;">
                                                    @else
                                                        <img src="{{ asset('themes/toko-online/assets/img/p1.jpg') }}"
                                                            alt="Ecommerce" style="width:80px;height: 80px;">
                                                    @endif
                                                    <div class="ms-3">
                                                        <a href="{{ shop_product_link($item->product) }}">
                                                            <h5 class="mb-0">{{ $item->product->name }}</h5>
                                                        </a>
                                                        <span>
                                                            @if ($item->product->hasSalePrice)
                                                                <span
                                                                    class="active-price text-danger">{{ $item->product->sale_price_label }}</span>
                                                                <span
                                                                    class="text-decoration-line-through text-muted ms-1">{{ $item->product->price_label }}</span>
                                                                <span>
                                                                    <small class="discount-percent ms-2 text-danger">Diskon
                                                                        {{ $item->product->discount_percent }}%</small>
                                                                </span>
                                                            @else
                                                                <span
                                                                    class="active-price text-dark">{{ $item->product->price_label }}</span>
                                                            @endif
                                                        </span>
                                                        <div class="mt-2 small lh-1">
                                                            <button type="button" class="btn btn-sm"
                                                                onclick="deleteData(`{{ route('carts.destroy', [$item->id]) }}`)"
                                                                class="text-decoration-none text-inherit">
                                                                <i class='bx bx-trash'></i>
                                                                <span class="text-muted">Hapus</span>
                                                            </button>
                                                            {{-- <button type="button" onclick="deleteData(`{{ route('carts.destroy', [$item->id]) }}`)" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 col-md-2 col-lg-2 d-flex justify-content-end">
                                                <input type="number" id="item-qty" name="qty[{{ $item->id }}]"
                                                    value="{{ $item->qty }}" class="form-control" min="1">
                                            </div>
                                            <div class="col-3 text-lg-end text-md-end col-md-3">
                                                @if ($item->product->hasSalePrice)
                                                    <span
                                                        class="active-price text-dark">{{ $item->discount_sub_total }}</span>
                                                @else
                                                    <span class="active-price text-dark">{{ $item->sub_total }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <h1 class="text-danger text-center m-5">Keranjang Kosong</h1>
                                @endforelse
                            </ul>
                            <div class="d-flex justify-content-between mt-4">
                                @if ($totalItems <= 0)
                                    <a href="{{ route('products.index') }}" class="btn btn-first">Menu Produk</a>
                                    {{-- <button href="#" id="simpan" class="btn btn-second"
                                        disabled>Simpan
                                        Perubahan</button> --}}
                                @else
                                    <a href="{{ route('products.index') }}" class="btn btn-first">Lanjut Belanja</a>
                                    <button type="submit" id="simpan-qty" class="btn btn-second d-none">Simpan
                                        Perubahan</button>
                                @endif
                            </div>
                            {{ html()->form()->close() }}
                            @include('themes.toko-online.shared.flash_message')
                        </div>
                        <div class="col-12 col-lg-4 col-md-5">
                            <div class="mb-5 card shadow">
                                <div class="card-body p-6">
                                    <!-- heading -->
                                    <h2 class="h5 mb-4">Detail Harga Pesanan</h2>
                                    <div class="card mb-2">
                                        <!-- list group -->
                                        <ul class="list-group list-group-flush">
                                            <!-- list group item -->
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="me-auto">
                                                    <div>Total Produk</div>
                                                </div>
                                                <span>{{ $cart->base_total_price_label }}</span>
                                            </li>
                                            <!-- list group item -->
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="me-auto">
                                                    <div>Total Diskon</div>
                                                </div>
                                                <span>{{ $cart->discount_amount_label }}</span>
                                            </li>
                                            <!-- list group item -->
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="me-auto">
                                                    <div class="fw-bold">Subtotal</div>
                                                </div>
                                                <span class="fw-bold">{{ $cart->sub_total_price_label }}</span>
                                            </li>
                                            <!-- list group item -->
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="me-auto">
                                                    <div>Biaya Pajak (11%)</div>
                                                </div>
                                                <span>{{ $cart->tax_amount_label }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-grid mb-1 mt-2">
                                        <!-- btn -->
                                        @if (auth()->user())
                                            @if ($totalItems == 0)
                                                <button href="#"
                                                    class="btn btn-disabled btn-first btn-lg d-flex justify-content-between align-items-center"
                                                    disabled>
                                                    Checkout
                                                    <span class="fw-bold">{{ $cart->grand_total_label }}</span>
                                                </button>
                                            @else
                                                <a class="btn btn-disabled btn-first btn-lg d-flex justify-content-between align-items-center"
                                                    href="{{ route('orders.checkout') }}">
                                                    Checkout
                                                    <span class="fw-bold">{{ $cart->grand_total_label }}</span>
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                    <!-- text -->
                                    <p>
                                        <small>
                                            Dengan melakukan pemesanan, Anda setuju untuk terikat oleh
                                            <a href="#!">Ketentuan Layanan</a>
                                            dan
                                            <a href="#!">Kebijakan Privasi.</a>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#cart-list #item-qty").change(function() {
            $('#simpan-qty').removeClass('d-none');
        })
        
        function deleteData(url) {
            Swal.fire({
                title: 'Yakin ingin menghapus produk dari keranjang?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        data: {
                            '_token': $('[name=csrf-token]').attr('content'),
                            '_method': 'delete',
                        },
                        success: function(response) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Berhasil menghapus produk dari keranjang',
                                timer: 1500,
                                showConfirmButton: false,
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(errors) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Gagal menghapus produk dari keranjang',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
