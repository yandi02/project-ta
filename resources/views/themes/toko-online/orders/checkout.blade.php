@extends('themes.toko-online.layouts.app')

@section('title')
    Checkout
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('carts.index') }}">Keranjang Belanja</a></li>
    <li class="breadcrumb-item active">Checkout</li>
@endsection

@section('content')
    <section class="main-content">
        <div class="container">
            <div class="row">
                <section class="col-lg-12 col-md-12 shopping-cart">
                    {{-- <div class="card bg-warning-subtle mb-4 border-0 section-header">
                        <div class="card-body p-5">
                            <h2 class="mb-0">Checkout</h2>
                        </div>
                    </div> --}}
                    <div class="card bg-warning-subtle shadow-none border-0 position-relative overflow-hidden mb-4">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h2 class="fw-semibold mb-8">Checkout</h2>
                                </div>
                                <div class="col-3">
                                    <div class="text-center">
                                        <img width="100" src="{{ asset('modernize2/images/checkout.png') }}"
                                            alt="modernize-img" class="img-fluid ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0"><i class='bx bx-map'></i> Alamat Pengiriman</h5>
                                <button onclick="addForm('{{ route('alamat.simpanAlamat') }}')"
                                    class="btn btn-outline-danger btn-sm">Tambah Alamat</button>
                            </div>
                            <form action="{{ route('orders.checkout') }}" method="POST">
                                @csrf
                                <div class="mt-3">
                                    <div class="row">
                                        @forelse ($addresses as $address)
                                            <div class="col-lg-6 col-12 mb-3">
                                                <div class="card card-body p-6">
                                                    <div class="form-check mb-4">
                                                        <input class="form-check-input delivery-address"
                                                            value="{{ $address->id }}" type="radio" name="address_id"
                                                            id="homeRadio" {{ $address->is_primary ? 'checked' : '' }}>
                                                        <label class="form-check-label text-dark"
                                                            for="homeRadio">{{ $address->label }}</label>
                                                    </div>
                                                    <!-- address -->
                                                    <address>
                                                        <strong>{{ $address->first_name }}
                                                            {{ $address->last_name }}</strong>
                                                        <br>

                                                        {{ $address->address1 }}
                                                        <br>

                                                        {{ $address->address2 }}
                                                        <br>

                                                        <abbr class="phone">{{ $address->phone }}</abbr>
                                                    </address>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            @if ($address->is_primary)
                                                                <span class="primary_address">Alamat Utama</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-6 text-end">
                                                            <button type="button" class="btn btn-sm text-danger"
                                                                onclick="deleteData('{{ route('alamat.hapusAlamat', $address->id) }}')"
                                                                class="text-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-danger">Tidak ada alamat</p>
                                        @endforelse
                                    </div>
                                </div>
                                <h5 class="mb-0"><i class='bx bxs-truck'></i> Jasa Kirim</h5>
                                <small style="font-style: italic" class="text-muted">*Klik salah satu kurir dan tunggu
                                    beberapa
                                    detik</small>
                                <div class="mt-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input courier-code" type="radio" name="courier"
                                            id="inlineRadio1" value="jne">
                                        <label class="form-check-label" for="inlineRadio1">JNE</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input courier-code" type="radio" name="courier"
                                            id="inlineRadio2" value="pos">
                                        <label class="form-check-label" for="inlineRadio2">POS</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input courier-code" type="radio" name="courier"
                                            id="inlineRadio2" value="tiki">
                                        <label class="form-check-label" for="inlineRadio2">TIKI</label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p>Jasa Tersedia:</p>
                                    <ul class="list-group list-group-flush available-service" style="display: none">
                                        {{-- @include('themes.toko-online.orders.shipping_fee') --}}
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('carts.index') }}" class="btn btn-second">Kembali ke Keranjang</a>
                                    @if (auth()->user())
                                        @if ($totalItems == 0)
                                            <button class="btn btn-first" disabled>Buat Pesanan</button>
                                        @else
                                            <button type="submit" id="place-order" class="btn btn-first" disabled>Buat
                                                Pesanan</button>
                                        @endif
                                    @endif
                                </div>
                            </form>
                            @include('themes.toko-online.shared.flash_message')
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="card shadow">
                                <div class="card-body p-6">
                                    <!-- heading -->
                                    <h2 class="h5 mb-3 mt-2">Detail Pesanan</h2>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($cart->items as $item)
                                            <li class="list-group-item py-3 border-top">
                                                <div class="row align-items-center">
                                                    <div class="col-6 col-md-6 col-lg-8">
                                                        <div class="d-flex">
                                                            @if ($item->product->featured_image)
                                                                <img src="{{ asset('storage/img/' . $item->product->featured_image) }}"
                                                                    alt="Ecommerce" style="width:50px;height: 50px;">
                                                            @else
                                                                <img src="{{ asset('themes/toko-online/assets/img/p1.jpg') }}"
                                                                    alt="Ecommerce" style="width:50px;height: 50px;">
                                                            @endif
                                                            <div class="ms-3">
                                                                <a href="{{ shop_product_link($item->product) }}">
                                                                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                                </a>
                                                                <span>
                                                                    @if ($item->product->hasSalePrice)
                                                                        <span
                                                                            class="active-price text-dark">{{ $item->product->sale_price_label }}</span>
                                                                        <span
                                                                            class="text-decoration-line-through text-muted">{{ $item->product->price_label }}</span>
                                                                    @else
                                                                        <span
                                                                            class="active-price text-dark">{{ $item->product->price_label }}</span>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 col-md-2 col-lg-1 text-center">
                                                        {{ $item->qty }}
                                                    </div>
                                                    <div class="col-3 text-lg-end text-end col-md-3">
                                                        @if ($item->product->hasSalePrice)
                                                            <span
                                                                class="active-price text-dark">{{ $item->discount_sub_total }}</span>
                                                        @else
                                                            <span
                                                                class="active-price text-dark">{{ $item->sub_total }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        <li class="list-group-item py-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div>Total Produk</div>
                                                <div>{{ $cart->base_total_price_label }}</div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div>Total Diskon</div>
                                                <div>{{ $cart->discount_amount_label }}</div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div class="fw-bold">Subtotal</div>
                                                <div class="fw-bold">{{ $cart->sub_total_price_label }}</div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div>Ongkos Kirim</div>
                                                <div id="shipping-fee">Rp. 0,00</div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>Biaya Pajak (11%)</div>
                                                <div>{{ $cart->tax_amount_label }}</div>
                                            </div>
                                        </li>
                                        <li class="list-group-item py-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2 fw-bold">
                                                <div class="fs-4">Grand Total</div>
                                                <div class="fs-4" id="grand-total">{{ $cart->grand_total_label }}</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @includeIf('themes.toko-online.orders.form')
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        

        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').html('<i class="nav-icon fas fa-cube"></i> Tambah Alamat');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=label]').focus();

            $('#modal-form').on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                        .done((response) => {
                            $('#modal-form').modal('hide');
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Alamat berhasil ditambah',
                                timer: 1500,
                                showConfirmButton: false,
                            }).then(() => {
                                location.reload();
                            });
                        })
                        .fail((errors) => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Alamat gagal ditambah',
                            });
                            return;
                        });
                }
            });
        }

        // function editForm(url) {
        //     $('#modal-form').modal('show');
        //     $('#modal-form .modal-title').html('<i class="nav-icon fas fa-cube"></i> Edit Produk');

        //     $('#modal-form form')[0].reset();
        //     $('#modal-form form').attr('action', url);
        //     $('#modal-form [name=_method]').val('put');
        //     $('#modal-form [name=user_id]').focus();

        //     $.get(url)
        //         .done((response) => {
        //             $('#modal-form [name=sku]').val(response.sku);
        //             $('#modal-form [name=user_id]').val(response.user_id);
        //             $('#modal-form [name=category]').val(response.category);
        //             $('#modal-form [name=name]').val(response.name);
        //             $('#modal-form [name=price]').val(response.price);
        //             $('#modal-form [name=sale_price]').val(response.sale_price);
        //             $('#modal-form [name=stock]').val(response.inventory);
        //             $('#modal-form [name=stock_status]').val(response.stock_status);
        //             $('#modal-form [name=description]').val(response.excerpt);
        //         })
        //         .fail((errors) => {
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Gagal',
        //                 text: 'Tidak dapat menampilkan data',
        //             });
        //             return;
        //         });
        // }

        function deleteData(url) {
            Swal.fire({
                title: 'Yakin ingin menghapus data terpilih?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(url, {
                            '_token': $('[name=csrf-token]').attr('content'),
                            '_method': 'delete',
                        })
                        .done((response) => {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Alamat berhasil dihapus',
                                timer: 1000,
                                showConfirmButton: false,
                            }).then(() => {
                                location.reload();
                            });
                        })
                        .fail((errors) => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Alamat gagal dihapus',
                            });
                        });
                }
            });
        }
    </script>
@endpush
