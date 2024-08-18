@extends('admin.layouts.master')

@section('title')
    Ubah Data Produk
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('product.index') }}">Data Produk</a></li>
    <li class="breadcrumb-item active">Ubah Data Produk</li>
@endsection

@section('content')
    <div class="card border-top border-primary bg-warning-subtle shadow-sm position-relative overflow-hidden mb-4">
        <div class="card-body ps-5 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h2 class="fw-semibold">Ubah Data Produk</h2>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img width="130" src="{{ asset('modernize2/images/package-box-edit.svg') }}" alt="modernize-img"
                            class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('product.update', $product->id) }}" id="productForm" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8 ">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-7">
                            <h4 class="card-title">Data Utama Produk</h4>
                            <div class="row justify-content-end mr-1">
                                <div class="col-sm-3 d-flex justify-content-end">
                                    <h5 class="sku-title fs-5 mt-2"></h5>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" name="sku" id="sku" class="form-control col-sm-5"
                                        value="{{ $product->sku }}" readonly>
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
                                    value="{{ $product->name }}" required>
                                <p class="fs-2">Isi nama produk dengan memilih nama yang unik.</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select name="category" class="form-control form-select" required>
                                    {{-- @foreach ($product->categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                    @foreach ($categories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach --}}
                                    @foreach ($categories as $id => $name)
                                        <option value="{{ $id }}"
                                            @if ($product->categories->pluck('id')->contains($id)) selected @endif>
                                            {{ $name }}
                                        </option>
                                    @endforeach

                                </select>

                                <p class="fs-2">Pilih kategori untuk membedakan produk.</p>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Deskripsi</label>
                            {{-- <div id="editor">
                            </div> --}}
                            <textarea class="form-control" name="description" id="" rows="5">{{ $product->excerpt }}</textarea>
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
                            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                            <p class="fs-2">Pastikan harga yang dimasukkan sesuai dengan nilai yang ingin tetapkan untuk
                                produk.</p>
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
                                    <label for="radio2"
                                        class="form-check-label form-check p-3 border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer"
                                        id="customControlValidation2" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-contact" aria-controls="nav-contact">
                                        <input type="radio" class="form-check-input" name="new-products" id="radio2">
                                        <span class="fs-4 text-dark">Diskon Tetap (Jika Diskon)</span>
                                    </label>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade mt-3" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab" tabindex="0">
                                    <div class="mb-1">
                                        <label class="form-label">Harga Diskon Tetap <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" id="sale_price" name="sale_price" class="form-control"
                                            placeholder="Harga Diskon" value="{{ $product->sale_price }}">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title mb-3">Foto Produk</h4>
                                </div>
                                <div class="btn-clear col-md-6 d-none d-flex justify-content-end">
                                    {{-- <button type="button" class="btn btn-sm btn-outline-danger"
                                    onclick="clearFileInput()">Hapus</button> --}}
                                    <a class="text-danger" type="button" onclick="clearFileInput()">Hapus</a>
                                </div>
                            </div>

                            {{-- <div class="dropzone-drag-area form-control" id="previews">
                                <div class="dz-message text-muted opacity-50" data-dz-message>
                                    <span>Drag file here to upload</span>
                                </div>
                                <div class="d-none" id="dzPreviewContainer">
                                    <div class="dz-preview dz-file-preview">
                                        <div class="dz-photo">
                                            <img class="dz-thumbnail" data-dz-thumbnail>
                                        </div>
                                        <button class="dz-delete border-0 p-0" type="button"
                                            data-dz-remove>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" id="times">
                                                <path fill="#FFFFFF"
                                                    d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
                            <label class="form-label">Input Foto <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" type="file" name="foto_produk" id="foto_produk">
                            </div>
                            <p class="fs-2">Lengkapi data produk dengan gambar.</p>

                            <label class="form-label">Preview Foto</label>
                            <div class="imprev rounded-md d-flex justify-content-center">
                                <img class="d-none" id="preview-image" class="mx-auto" width="200" />
                                <p class="none-text text-danger fw-bolder">Belum ada foto produk</p>
                            </div>
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
                                <input type="number" name="stock" class="form-control"
                                    value="{{ $product->inventory->qty }}">
                                <p class="fs-2">Tetapkan stok produk yang tersedia.</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Berat Produk(gr) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="weight" class="form-control"
                                    value="{{ $product->weight }}">
                                <p class="fs-2">Masukkan informasi berat produk.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions mb-5">
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>
            <button type="button" class="btn bg-danger-subtle text-danger ms-6" onclick="window.history.back()">
                Batal
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
                        text: 'Perubahan berhasil disimpan',
                    }).then(() => {
                        window.location.href =
                            '/admin/product';
                    })
                },
                error: function(errors) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Perubahan gagal disimpan',
                    });
                }
            });
        });

        $('.sku-title').html('SKU');

        $(document).ready(function() {
            var previewImage = document.getElementById('preview-image');
            var featuredImage = '{{ $product->featured_image }}';
            var hasDiscount = '{{ $product->sale_price }}';

            if (featuredImage) {
                previewImage.src = '{{ asset('storage/img/') }}/' + featuredImage;
                previewImage.style.display = 'block';
                $('.btn-clear').removeClass('d-none');
                $('#preview-image').removeClass('d-none');
                $('.none-text').addClass('d-none');
            }

            if (hasDiscount) {
                $('#radio2').prop('checked', true);
                $('#nav-contact').addClass('active show');
            }

            $('#radio1').on('click', function() {
                $('#nav-contact').removeClass('active show');
                document.getElementById('sale_price').value = "";
            });

            $('#radio2').on('click', function() {
                $('#nav-contact').addClass('active show');
            });
        });


        function previewImage(input) {
            var previewContainer = document.getElementById('preview-container');
            var previewImage = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                $('#preview-image').removeClass('d-none');
                $('.none-text').addClass('d-none');

                reader.readAsDataURL(input.files[0]);
            } else {
                previewImage.src = '';
                previewImage.style.display = 'none';
            }
        }

        document.getElementById('foto_produk').addEventListener('change', function() {
            previewImage(this);
            $('.btn-clear').removeClass('d-none')
        });

        function clearFileInput() {
            document.getElementById('foto_produk').value = "";

            document.getElementById('preview-image').src = '';
            document.getElementById('preview-image').style.display = 'none';
            $('.btn-clear').addClass('d-none');
            $('.none-text').removeClass('d-none');
        }
    </script>
@endpush
