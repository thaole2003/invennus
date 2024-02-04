@extends('layouts.app')

@section('content')
    <div class="fxt-content">
        <div class="fxt-header">
        </div>
        <div class="fxt-form">
            <div class="fxt-transformY-50 fxt-transition-delay-1">
                <h2>Đăng nhập</h2>
            </div>
            <div class="fxt-transformY-50 fxt-transition-delay-2">
                <p>Đăng nhập để mua hàng</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-4">
                        {{-- <input type="email" class="form-control" name="email" placeholder="Email Address"
                            required="required"> --}}
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Địa chỉ email"
                            autocomplete="email" autofocus>
                        <i class="flaticon-envelope"></i>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-5">
                        {{-- <input type="password" class="form-control" name="password" placeholder="Password" required="required"> --}}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Mật khẩu" name="password" autocomplete="current-password">
                        <i class="flaticon-padlock"></i>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-6">
                        <div class="fxt-content-between">
                            <button type="submit" class="fxt-btn-fill">Đăng nhập</button>
                            {{-- <a href="forgot-password-29.html" class="switcher-text2">Forgot Password</a> --}}
                            @if (Route::has('password.request'))
                                <a class="switcher-text2" href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- <div class="fxt-footer">
            <div class="fxt-transformY-50 fxt-transition-delay-8">
                <h3>Hoặc đăng nhập với:</h3>
            </div>
            <ul class="fxt-socials">
                <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-9">
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-10">
                    <a href="#" title="twitter"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="fxt-google fxt-transformY-50 fxt-transition-delay-11">
                    <a href="#" title="google"><i class="fab fa-google-plus-g"></i></a>
                </li>
                <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-12">
                    <a href="#" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
                </li>
                <li class="fxt-pinterest fxt-transformY-50 fxt-transition-delay-13">
                    <a href="#" title="pinterest"><i class="fab fa-pinterest-p"></i></a>
                </li>
            </ul>
        </div> --}}
    </div>
@endsection
