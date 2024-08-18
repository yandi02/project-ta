@extends('auth.partials.auth')

@section('title')
    Daftar
@endsection

@section('content')
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Daftar Akun</h2>
                    <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" class="@error('name') is-invalid @enderror" name="name" id="name"
                                placeholder="Username" value="{{ old('name') }}" autofocus />
                            <i class="fas fa-exclamation-circle error-icon"></i>
                        </div>
                        @error('name')
                            <div class="text-red">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="@error('email') is-invalid @enderror" name="email" id="email"
                                placeholder="Email" value="{{ old('email') }}" />
                            <i class="fas fa-exclamation-circle error-icon"></i>
                        </div>
                        @error('email')
                            <div class="text-red">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" class="@error('password') is-invalid @enderror" name="password"
                                id="password" placeholder="Password" autocomplete="new-password" />
                            <i class="fas fa-exclamation-circle error-icon"></i>
                        </div>
                        @error('password')
                            <div class="text-red">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" class="@error('password') is-invalid @enderror"
                                name="password_confirmation" autocomplete="new-password" id="password-confirm"
                                placeholder="Konfirmasi password" />
                            <i class="fas fa-exclamation-circle error-icon"></i>
                        </div>
                        @error('password')
                            <div class="text-red">{{ $message }}</div>
                        @enderror

                        <div class="control-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Daftar" />
                        </div>

                        <p class="divider">atau</p>

                        <div class="control-button">
                            <a href="{{ route('login') }}" class="signup-image-link">Saya sudah punya akun</a>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <h2 class="form-title">D<span class="title-color">RR</span></h2>
                    <figure><img src="{{ asset('img/toko2.jpg') }}" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>
@endsection