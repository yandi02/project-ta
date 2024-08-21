{{-- @extends('admin.layouts.master') --}}
@extends('admin.layouts.master')

@section('title')
    Dashboard Admin
@endsection

@section('content')
    {{-- <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <h1 class="text-center mb-4">
            Selamat Datang, Admin {{ auth()->user()->name }}!
        </h1>
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box -info">
                    <div class="inner">
                        <h3>{{ $category }}</h3>

                        <p>Data Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-layer-group"></i>
                    </div>
                    <a href="{{ route('category.index') }}" class="small-box-footer">Lihat Detail <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box">
                    <div class="inner">
                        <h3>{{ $product }}</h3>

                        <p>Data Produk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('product.index') }}" class="small-box-footer">Lihat Detail <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="owl-carousel counter-carousel owl-theme">
        <div class="item">
            <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                <div class="card-body pb-0">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-briefcase.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-warning mb-1">Total Produk</p>
                        <h5 class="fw-semibold text-warning mb-0">{{ $product }}</h5>
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
                <div class="card-body pb-0">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-connect.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-info mb-1">Total Kategori</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $category }}</h5>
                    </div>
                </div>
                <a class="btn fw-bolder m-3" href="{{ route('category.index') }}">Lihat Detail</a>
            </div>
        </div>
    </div> --}}

    {{-- <div id="toast-container" class="toast-container toast-top-right">
        <div class="toast toast-success" aria-live="polite" style="display: block; opacity: 0.996981;">
            <div class="toast-title">Slide Down / Slide Up!</div>
            <div class="toast-message">I do not think that word means what you think it means.</div>
        </div>
    </div> --}}

    <div class="d-flex justify-content-center">
        <div class="col-md-4 col-lg-5">
            <div class="card border-start border-end border-danger text-center bg-white-subtle p-0 card-hover rounded-3">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                <div class="p-2 d-block">
                    <p class="fs-5 fw-bolder">Selamat Datang!</p>
                    <img src="{{ asset('storage/img/' . Auth::user()->foto) }}" width="75"
                        class="rounded-circle img-fluid">
                    <h5 class="card-title mt-3">{{ Auth::user()->name }}</h5>
                    <span class="badge bg-danger-subtle text-danger mb-3 fs-3">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="owl-carousel">
        <div class="item">
            <div class="card bg-danger-subtle border-start border-end border-danger">
                <div class="card-body px-n5 pt-n5 pb-0">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-briefcase.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-danger mb-1">Total Produk</p>
                        <h5 class="fw-semibold text-danger mb-0">{{ $product }}</h5>
                    </div>
                </div>
                <a class="btn btn-outline-danger fw-bolder m-3" href="{{ route('product.index') }}">Lihat
                    Detail</a>
            </div>
        </div>
        <div class="item">
            <div class="card bg-success-subtle border-start border-end border-success">
                <div class="card-body px-n5 pt-n5 pb-0">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-speech-bubble.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-success mb-1">Total Pengguna</p>
                        <h5 class="fw-semibold text-success mb-0">{{ $user }}</h5>
                    </div>
                </div>
                <a class="btn btn-outline-success fw-bolder m-3" href="{{ route('pelanggan.index') }}">Lihat
                    Detail</a>
            </div>
        </div>
        <div class="item">
            <div class="card bg-info-subtle border-start border-end border-info">
                <div class="card-body px-n5 pt-n5 pb-0">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-connect.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-info mb-1">Total Kategori</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $category }}</h5>
                    </div>
                </div>
                <a class="btn btn-outline-primary fw-bolder m-3" href="{{ route('category.index') }}">Lihat
                    Detail</a>
            </div>
        </div>
        <div class="item">
            <div class="card bg-warning-subtle border-start border-end border-warning">
                <div class="card-body px-n5 pt-n5 pb-0">
                    <div class="text-center">
                        <img src="{{ asset('modernize2/images/icon-speech-bubble.svg') }}" width="50" height="50"
                            class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-warning mb-1">Total Pesanan</p>
                        <h5 class="fw-semibold text-warning mb-0">{{ $order }}</h5>
                    </div>
                </div>
                <a class="btn btn-outline-warning fw-bolder m-3" href="{{ route('pesanan.index') }}">Lihat
                    Detail</a>
            </div>
        </div>
    </div>
@endsection
