<nav class="navbar navbar-expand-lg bg-white fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand display-6 me-1" href="{{ route('toko') }}">D<span>RR</span></a>
        <div class="menu d-flex justify-content-center align-items-center mx-2">
            <a class="btn-nav active px-0 mx-2" href="{{ route('toko') }}">Beranda</a>
            <a class="btn-nav px-0 mx-2" href="{{ route('products.index') }}">Produk</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form id="search-form" action="{{ route('products.search', ':searchparameter') }}" method="GET"
                style="width: 600px">
                <div class="input-group mt-3 mt-lg-0 nav-input">
                    <input id="search" name="search" type="text" class="form-control" placeholder="Mau cari apa?"
                        aria-label="Mau cari apa?" aria-describedby="button-addon2" value="{{ request('search') }}">
                    <button class="btn btn-outline-danger" type="submit" id="button-addon2"><i
                            class="bx bx-search"></i></button>
                </div>
            </form>
            <ul class="navbar-nav mt-3 mt-sm-0 ml-4">
                <li class="nav-item mx-4">
                    <a class="nav-link mt-1" href="{{ route('carts.index') }}">
                        <i class="bx bx-cart-alt"></i>
                        @if (auth()->user())
                            @if ($totalItems > 0)
                                @if ($totalItems > 9)
                                    <span class="badge text-bg-warning rounded-circle position-absolute">9+</span>
                                @else
                                    <span
                                        class="badge text-bg-warning rounded-circle position-absolute">{{ $totalItems }}</span>
                                @endif
                            @else
                                <span></span>
                            @endif
                        @endif
                    </a>
                </li>
                @if (auth()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            style="margin-left: 170px" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    @if (Auth::user()->foto)
                                        <img src="{{ asset('storage/img/' . Auth::user()->foto) }}"
                                            class="rounded-circle" width="35" height="35" alt="User Image" />
                                    @else
                                        <img src="https://via.placeholder.com/600x800?text=Foto+Profil"
                                            class="rounded-circle" width="35" height="35" alt="User Image" />
                                    @endif
                                </div>
                                {{-- <h5 class="fw-semibold pt-2 ps-2 user-profile-name">{{ auth()->user()->name }}</h5> --}}
                            </div>
                        </a>
                        <div class="dropdown-menu shadow-lg border-0 content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    @if (Auth::user()->foto)
                                        <img src="{{ asset('storage/img/' . Auth::user()->foto) }}"
                                            class="rounded-circle" width="35" height="35" alt="User Image" />
                                    @else
                                        <img src="https://via.placeholder.com/600x800?text=Foto+Profil"
                                            class="rounded-circle" width="75" height="75" alt="User Image" />
                                    @endif
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-6">{{ Auth::user()->name }}</h5>
                                        <p class="mb-0 d-flex align-items-center gap-2">
                                            <i class="ti ti-mail fs-5"></i> {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="message-body">
                                    @if (auth()->user()->level == 1)
                                        <a href="{{ route('profile_user.index') }}"
                                            class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('modernize2/images/icon-account.svg') }}"
                                                    alt="" width="24" height="24" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fw-semibold lh-base">Profil</h6>
                                                <span class="d-block text-body-secondary">Pengaturan Akun</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('home') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('modernize2/images/icon-tasks.svg') }}"
                                                    alt="" width="24" height="24" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fw-semibold lh-base">Panel Admin</h6>
                                                <span class="d-block text-body-secondary">Kelola Data Master</span>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ route('profile_user.index') }}"
                                            class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('modernize2/images/icon-account.svg') }}"
                                                    alt="" width="24" height="24" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fw-semibold lh-base">Profil</h6>
                                                <span class="d-block text-body-secondary">Pengaturan
                                                    Akun</span>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <div class="d-grid py-3 px-7">
                                    <a href="#" class="btn btn-outline-primary"
                                        onclick="document.getElementById('logout-form').submit()">Log Out</a>
                                    <form action="{{ route('logout') }}" id="logout-form" method="post">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item mt-2 mt-lg-1 text-center" style="margin-left: 55px">
                        <a class="btn btn-outline-danger shadow-none me-lg-3" href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item mt-3 mt-lg-1 text-center">
                        <a class="btn btn-outline-danger shadow-none" href="{{ route('register') }}">Daftar</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<script>
    document.getElementById('search-form').addEventListener('submit', function(event) {
        event.preventDefault();

        var searchInput = document.getElementById('search').value;

        var formAction = this.getAttribute('action').replace(':searchparameter', encodeURIComponent(searchInput));

        this.setAttribute('action', formAction);

        this.submit();
    });
</script>