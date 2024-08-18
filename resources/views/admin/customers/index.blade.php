@extends('admin.layouts.master')

@section('title')
    Data Pelanggan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Pelanggan</li>
@endsection

@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card border-top border-primary w-100">
            <div class="card-body pt-3">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="fw-bolder">Data Pelanggan</h4>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-pelanggan text-center">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- @includeIf('admin.category.form') --}}
    </div>
@endsection

@push('scripts')
    <script>
        let table;

        $(function() {
            table = $('.table-pelanggan').DataTable({
                autoWidth: false,
                ajax: {
                    url: '{{ route('pelanggan.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'nohp'
                    },
                    {
                        data: 'alamat'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
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
