@extends('auth.partials.auth')

@section('title')
    Login
@endsection

@section('content')
    <!-- Sing in  Form -->
    <section class="signin">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <h2 class="form-title">D<span class="title-color">RR</span></h2>
                    <figure><img src="{{ asset('img/toko2.jpg') }}" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Login</h2>
                    <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" class="@error('email') is-invalid @enderror" name="email" id="email"
                                placeholder="Email" value="{{ old('email') }}" autofocus />
                            <i class="fas fa-exclamation-circle error-icon"></i>
                        </div>
                        @error('email')
                            <div class="text-red">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="@error('password') is-invalid @enderror" name="password"
                                id="password" placeholder="Password" />
                            <i class="fas fa-exclamation-circle error-icon"></i>
                        </div>
                        @error('password')
                            <div class="text-red">{{ $message }}</div>
                        @enderror

                        <div class="button-group">
                            <div class="control-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>

                            <p class="divider">atau</p>

                            <div class="control-button">
                                <a href="{{ route('register') }}" class="signup-image-link">Buat akun baru</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
