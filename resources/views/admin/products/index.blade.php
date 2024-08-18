{{-- @extends('admin.layouts.master') --}}
@extends('admin.layouts.master')

@section('title')
    Data Produk
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Produk</li>
@endsection

@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card card-outline card-danger">
                    <div class="card-header">
                        <button onclick="addForm('{{ route('product.store') }}')" class="btn btn-outline-danger btn-sm"><i
                                class="fa fa-sm fa-plus"></i> Tambah
                            Data</button>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-produk text-center">
                            <thead>
                                <th width="1%">
                                    <input type="checkbox" name="select_all" id="select_all">
                                </th>
                                <th width="5%">No</th>
                                <th>Foto</th>
                                <th width="10%">SKU</th>
                                <th>Nama</th>
                                <th width="15%">Slug</th>
                                <th width="10%">Harga</th>
                                <th width="10%">Harga Diskon</th>
                                <th width="5%">Stok</th>
                                <th width="7%">Aksi</th>
                            </thead>
                            <tbody class="table-group-divider">
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        @includeIf('admin.products.form')
    </div> --}}

    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card border-top border-primary w-100">
            <div class="card-body pt-3">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="fw-bolder">Data Produk</h4>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            {{-- <button class="btn btn-sm btn-info" onclick="addForm('{{ route('product.store') }}')"
                                class="btn btn-outline-danger btn-sm"><i class="ti ti-plus"></i> Tambah Data</button> --}}
                            <button onclick="window.location.href='{{ route('product.create') }}'"
                                class="btn btn-primary btn-sm"><i class="ti ti-plus"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-produk text-center" id="productTable">
                        <thead>
                            <tr>
                                {{-- <th width="1%">
                                    <input type="checkbox" name="select_all" id="select_all">
                                </th> --}}
                                <th width="5%">No</th>
                                <th width="12%">Foto</th>
                                <th width="10%">SKU</th>
                                <th>Nama</th>
                                <th width="14%">Harga</th>
                                <th width="14%">Harga Diskon</th>
                                <th width="5%">Berat</th>
                                <th width="5%">Stok</th>
                                <th width="7%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @includeIf('admin.products.form')
    </div>
@endsection

@push('scripts')
    <script>
        let table;

        $(document).ready(function() {
            var bodyElement = document.querySelector('body');

            if (bodyElement) {
                var currentType = bodyElement.getAttribute('data-sidebartype');

                if (currentType === 'full') {
                    bodyElement.setAttribute('data-sidebartype', 'mini-sidebar');
                }
            }
        });

        // $(function () {
        //     table = $('#productTable').DataTable({
        //         "columnDefs": [{
        //             "targets": [1, 2, 3, 4, 5, 6, 7],
        //             "orderable": false,
        //         }], 
        //     });
        // })

        $(function() {
            table = $('.table-produk').DataTable({
                autoWidth: false,
                ajax: {
                    url: '{{ route('product.data') }}',
                },
                "columnDefs": [{
                    "targets": [1, 2, 3, 4, 5, 6, 7, 8],
                    "orderable": false,
                }],
                columns: [
                    // {
                    //     data: 'select_all'
                    // },
                    {
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'featured_image'
                    },
                    {
                        data: 'sku'
                    },
                    {
                        data: 'name'
                    },
                    // {
                    //     data: 'slug'
                    // },
                    {
                        data: 'price'
                    },
                    {
                        data: 'sale_price'
                    },
                    {
                        data: 'weight'
                    },
                    {
                        data: 'stock'
                    },
                    {
                        data: 'aksi'
                    },
                ],
            });

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
                        $('#modal-form').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Berhasil',
                        });
                        table.ajax.reload();
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


            $('[name=select_all]').on('click', function() {
                $(':checkbox').prop('checked', this.checked);
            });
        });

        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').html('<i class="nav-icon ti ti-packages"></i> Tambah Produk');
            $('#modal-form .sku-title').html('SKU');

            $('#productForm')[0].reset();
            $('#productForm').attr('action', url);
            $('#productForm [name=_method]').val('post');

            var randomSku = Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;
            var prefixedSku = 'DRR' + randomSku;
            $('#productForm [name=sku]').val(prefixedSku);
            $('#productForm [name=sku]').prop('readonly', true);
        }

        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').html('<i class="nav-icon ti ti-packages"></i> Edit Produk');

            $('#productForm')[0].reset();
            $('#productForm').attr('action', url);
            $('#productForm [name=_method]').val('put');
            $('#productForm [name=user_id]').focus();
            $('#productForm #foto_produk').removeAttr('required');

            // Mengambil CSRF token dari meta tag di halaman
            // var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.get(url)
                .done((response) => {
                    console.log(response);
                    $('#productForm [name=sku]').val(response.sku);
                    $('#productForm [name=user_id]').val(response.user_id);
                    $('#productForm [name=category]').val(response.categories[0].id).change();
                    $('#productForm [name=name]').val(response.name);
                    $('#productForm [name=price]').val(response.price);
                    $('#productForm [name=sale_price]').val(response.sale_price);
                    $('#productForm [name=stock]').val(response.inventory.qty);
                    $('#productForm [name=stock_status]').val(response.stock_status);
                    $('#productForm [name=description]').val(response.excerpt);

                    // Menambahkan CSRF token ke dalam form
                    // $('#productForm').append('<input type="hidden" name="_token" value="' + csrfToken + '">');
                })
                .fail((errors) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Tidak dapat menampilkan data',
                    });
                });
        }


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
                            '_method': 'delete'
                        })
                        .done((response) => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Data berhasil dihapus',
                            });
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Data sedang digunakan',
                            });
                        });
                }
            });
        }
    </script>
@endpush
