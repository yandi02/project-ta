{{-- @extends('admin.layouts.master') --}}
@extends('admin.layouts.master')

@section('title')
    Data Pesanan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Pesanan</li>
@endsection

@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card card-outline card-danger">
                    <div class="card-header">
                        <button onclick="addForm('{{ route('category.store') }}')" class="btn btn-outline-danger btn-sm"><i
                                class="fa fa-sm fa-plus"></i> Tambah
                            Data</button>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-sm table-kategori text-center">
                            <thead>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th width="10%">Aksi</th>
                            </thead>
                            <tbody class="table-group-divider">
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        @includeIf('admin.category.form')
    </div> --}}

    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card border-top border-primary w-100">
            <div class="card-body pt-3">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="fw-bolder">Data Pesanan</h4>
                        </div>
                        {{-- <div class="col-md-6 d-flex justify-content-end">
                            <button onclick="addForm('{{ route('category.store') }}')"
                        class="btn btn-primary btn-sm"><i class="ti ti-plus"></i> Tambah Data</button>
                        </div> --}}
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-pesanan text-center">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let table;

        // $(document).ready(function() {
        //     var bodyElement = document.querySelector('body');

        //     if (bodyElement) {
        //         var currentType = bodyElement.getAttribute('data-sidebartype');

        //         if (currentType === 'full') {
        //             bodyElement.setAttribute('data-sidebartype', 'mini-sidebar');
        //         }
        //     }
        // });

        // $(function () { 
        //     table = $('.table-pesanan').DataTable({
        //         "columnDefs": [{
        //             "targets": [1, 2, 3],
        //             "orderable": false,
        //         }],
        //     });
        // })

        $(function() {
            table = $('.table-pesanan').DataTable({
                // processing: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('pesanan.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'full_name'
                    },
                    {
                        data: 'customer_address1'
                    },
                    {
                        data: 'customer_phone'
                    },
                    {
                        data: 'grand_total'
                    },
                    {
                        data: 'status'
                    },
                ],
                bSort: false
            });

            // $('#modal-form').validator().on('submit', function(e) {
            //     if (!e.preventDefault()) {
            //         $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
            //             .done((response) => {
            //                 $('#modal-form').modal('hide');
            //                 Swal.fire({
            //                     icon: 'success',
            //                     title: 'Sukses',
            //                     text: 'Berhasil',
            //                 });
            //                 table.ajax.reload();
            //             })
            //             .fail((errors) => {
            //                 Swal.fire({
            //                     icon: 'error',
            //                     title: 'Gagal',
            //                     text: 'Tidak dapat menyimpan data',
            //                 });
            //                 return;
            //             });
            //     }
            // })
        });

        // function addForm(url) {
        //     $('#modal-form').modal('show');
        //     $('#modal-form .modal-title').html('<i class="nav-icon ti ti-package"></i> Tambah Kategori');

        //     $('#modal-form form')[0].reset();
        //     $('#modal-form form').attr('action', url);
        //     $('#modal-form [name=_method]').val('post');
        //     $('#modal-form [name=name]').focus();
        // }

        // function editForm(url) {
        //     $('#modal-form').modal('show');
        //     $('#modal-form .modal-title').html('<i class="nav-icon ti ti-package"></i> Edit Kategori');

        //     $('#modal-form form')[0].reset();
        //     $('#modal-form form').attr('action', url);
        //     $('#modal-form [name=_method]').val('put');
        //     $('#modal-form [name=name]').focus();

        //     $.get(url)
        //         .done((response) => {
        //             $('#modal-form [name=name]').val(response.name);
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

        // function deleteData(url) {
        //     Swal.fire({
        //         title: 'Yakin ingin menghapus data terpilih?',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Hapus',
        //         cancelButtonText: 'Batal',
        //         allowOutsideClick: false,
        //         allowEscapeKey: false
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.post(url, {
        //                     '_token': $('[name=csrf-token]').attr('content'),
        //                     '_method': 'delete'
        //                 })
        //                 .done((response) => {
        //                     Swal.fire({
        //                         icon: 'success',
        //                         title: 'Sukses',
        //                         text: 'Data berhasil dihapus',
        //                     });
        //                     table.ajax.reload();
        //                 })
        //                 .fail((errors) => {
        //                     Swal.fire({
        //                         icon: 'error',
        //                         title: 'Gagal',
        //                         text: 'Data sedang digunakan',
        //                     });
        //                 });
        //         }
        //     });
        // }
    </script>
@endpush
