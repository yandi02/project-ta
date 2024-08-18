@extends('tes.layouts.master')

@section('content')
    <div class="owl-carousel counter-carousel owl-theme">
        {{-- <div class="item">
            <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-user-male.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-primary mb-1">
                            Employees
                        </p>
                        <h5 class="fw-semibold text-primary mb-0">96</h5>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="item">
            <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                <div class="card-body pb-0">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-briefcase.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-warning mb-1">Produk</p>
                        <h5 class="fw-semibold text-warning mb-0">3,650</h5>
                    </div>
                </div>
                <a class="btn fw-bolder m-3" href="{{ route('product.index') }}">Lihat Detail</a>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-mailbox.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-info mb-1">Projects</p>
                        <h5 class="fw-semibold text-info mb-0">356</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-favorites.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-danger mb-1">Events</p>
                        <h5 class="fw-semibold text-danger mb-0">696</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-connect.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-info mb-1">Reports</p>
                        <h5 class="fw-semibold text-info mb-0">59</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body pt-3">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="fw-bolder">Data Kategori</h4>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <button class="btn btn-sm btn-info" onclick="addForm('{{ route('category.store') }}')"
                        class="btn btn-outline-danger btn-sm">+ Tambah Data</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-kategori text-center" id="productTable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @includeIf('admin.category.form')
    </div> --}}
@endsection
