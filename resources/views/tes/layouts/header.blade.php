<nav class="main-header navbar navbar-expand navbar-white navbar-light elevation-1">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @if (auth()->check())
        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle pt-2" data-toggle="dropdown">
                <img src="{{ asset('img/admin.png') }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                style="width: 300px; margin-top: 7px; margin-right: -8px;">
                <!-- User image -->
                <li class="user-header bg-info" style="height: 170px">
                    <img src="{{ asset('img/admin.png') }}" class="img-circle elevation-2" alt="User Image">

                    <p>{{ auth()->user()->name }} - Administrator <br> {{ auth()->user()->email }}</p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="#" class="btn btn-default"
                                onclick="document.getElementById('logout-form').submit()">Keluar</a>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        @else
            <li class="nav-item mt-5 mt-lg-0 text-center">
                <a class="nav-link btn-second me-lg-3" href="{{ route('login') }}">Masuk</a>
            </li>
            <li class="nav-item mt-3 mt-lg-0 text-center">
                <a class="nav-link btn-first me-lg-3" href="{{ route('register') }}">Daftar</a>
            </li>
        @endif
    </ul>
</nav>
<form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">
    @csrf
</form>
