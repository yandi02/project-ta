@extends('tes.layouts.master')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Tambah Produk</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="../main/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Add Product</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../assets/images/breadcrumb/ChatBc.png" alt="modernize-img" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('product.store') }}" id="productForm" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8 ">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-7">
                            <h4 class="card-title">General</h4>
                            <div class="row justify-content-end mr-1">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <h5 class="sku-title fs-5 mt-2"></h5>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" name="sku" id="sku" class="form-control col-sm-5"
                                        readonly>
                                </div>
                            </div>

                            <button class="navbar-toggler border-0 shadow-none d-md-none" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="ti ti-menu fs-5 d-flex"></i>
                            </button>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <label class="form-label">Nama Produk <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Produk"
                                    required>
                                <p class="fs-2">Isi nama produk dengan memilih nama yang unik.</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select name="category" class="form-control form-select" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($category as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                <p class="fs-2">Pilih kategori untuk membedakan produk.</p>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Deskripsi</label>
                            {{-- <div id="editor">
                            </div> --}}
                            <textarea class="form-control" name="description" id="" rows="5"></textarea>
                            <p class="fs-2 mb-0">Tetapkan deskripsi produk untuk informasi yang lebih
                                lengkap.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Penetapan Harga</h4>
                        <div class="mb-7">
                            <label class="form-label">Harga Produk <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="price" class="form-control" value="Product Price">
                            <p class="fs-2">Masukkan harga produk.</p>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Diskon</label>
                            <nav>
                                <div class="nav nav-tabs justify-content-between align-items-center gap-9" id="nav-tab"
                                    role="tablist">
                                    <label for="radio1"
                                        class="form-check-label form-check p-3  border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer"
                                        id="customControlValidation2" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" aria-controls="nav-home">
                                        <input type="radio" class="form-check-input" name="new-products" id="radio1"
                                            checked>
                                        <span class="fs-4 text-dark">Tidak ada diskon</span>
                                    </label>
                                    <label for="radio3"
                                        class="form-check-label form-check p-3 border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer"
                                        id="customControlValidation2" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-contact" aria-controls="nav-contact">
                                        <input type="radio" class="form-check-input" name="new-products"
                                            id="radio3">
                                        <span class="fs-4 text-dark">Diskon Tetap (Jika Diskon)</span>
                                    </label>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade mt-7" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab" tabindex="0">
                                    <div class="mb-1">
                                        <label class="form-label">Harga Diskon Tetap <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="sale_price" class="form-control"
                                            placeholder="Harga Diskon">
                                        <p class="fs-2 pt-1">Tetapkan harga produk yang didiskon. Harga
                                            Produk akan
                                            berkurang dari harga tetap yang ditentukan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="card border">
                        <div class="card-body">
                            <h4 class="card-title mb-7">Foto Produk</h4>

                            {{-- <div class="dropzone-drag-area form-control" id="previews">
                                <div class="dz-message text-muted opacity-50" data-dz-message>
                                    <span>Drag file here to upload</span>
                                </div>
                                <div class="d-none" id="dzPreviewContainer">
                                    <div class="dz-preview dz-file-preview">
                                        <div class="dz-photo">
                                            <img class="dz-thumbnail" data-dz-thumbnail>
                                        </div>
                                        <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times">
                                                <path fill="#FFFFFF"
                                                    d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
                            <input class="form-control" type="file" name="foto_produk" id="foto_produk">
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-7">
                                <h4 class="card-title">Informasi Stok</h4>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Jumlah Stok <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="stock" class="form-control" value="Product Price">
                                <p class="fs-2">Tetapkan stok produk yang tersedia.</p>
                            </div>
                            {{-- <div>
                                <label class="form-label">Stok Status <span class="text-danger">*</span>
                                </label>
                                <select class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect">
                                    @foreach (Modules\Shop\App\Models\Product::STOCK_STATUSES as $status => $label)
                                    <option value="{{ $status }}">{{ $label }}</option>
                                @endforeach
                                </select>
                                <p class="fs-2 mb-0">
                                    Pilih status dari ketersediaan produk.
                                </p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions mb-5">
            <button type="submit" class="btn btn-primary">
                Save changes
            </button>
            <button type="button" class="btn bg-danger-subtle text-danger ms-6">
                Cancel
            </button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $('#productForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil',
                    }).then(() => {
                        window.location.href =
                            '/admin/product';
                    })
                },
                error: function(errors) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Tidak dapat menyimpan data',
                    });
                }
            });
        });

        $('.sku-title').html('SKU');

        // $('#productForm')[0].reset();
        // $('#productForm').attr('action', url);
        // $('#productForm [name=_method]').val('post');

        var randomSku = Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;
        var prefixedSku = 'DRR' + randomSku;
        $('[name=sku]').val(prefixedSku);
        $('[name=sku]').prop('readonly', true);
    </script>
@endpush
