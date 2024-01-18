@extends('layouts.app')

@section('content')

    <div class="fxt-content">
        <div class="fxt-header">
            {{-- <a href="login-29.html" class="fxt-logo"><img src="img/logo-29.png" alt="Logo"></a> --}}
            {{-- <a href="login-29.html" class="fxt-logo"><img src="{{ asset('authen/img/logo-29.png') }}" alt="Logo"></a> --}}

        </div>
        <div class="fxt-form">
            <div class="fxt-transformY-50 fxt-transition-delay-1">
                <h2>Đăng ký</h2>
            </div>
            <div class="fxt-transformY-50 fxt-transition-delay-2">
                <p>Tạo tài khoản cho bạn</p>
            </div>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        {{-- <input type="text" class="form-control" name="name" placeholder="Name" required="required"> --}}
                        <input id="name" type="text" placeholder="Tên của bạn"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" autocomplete="name" autofocus>
                        <i class="flaticon-user"></i>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        <input id="email" type="email" placeholder="Địa chỉ email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="email">
                        {{-- <input type="email" class="form-control" name="email" placeholder="Email Address"
                            required="required"> --}}
                        <i class="flaticon-envelope"></i>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        <input id="phone" type="text" placeholder="Số điện thoại"
                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                            value="{{ old('phone') }}" autocomplete="phone">
                        <i class="fas fa-phone"></i>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        <input id="phone" type="text" placeholder="Địa chỉ"
                            class="form-control @error('address') is-invalid @enderror" name="address"
                            value="{{ old('address') }}" autocomplete="address">
                        <i class="fas fa-map-marker-alt"></i>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                        {{-- <input type="password" class="form-control" name="password" placeholder="Password"
                            required="required"> --}}
                        <input id="password" type="password" placeholder="Mật khẩu"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password">
                        <i class="flaticon-padlock"></i>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                        {{-- <input type="password" class="form-control" name="password" placeholder="Password"
                            required="required"> --}}
                        {{-- <input id="password" type="password" placeholder="Re-Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password"> --}}
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                        <i class="flaticon-padlock"></i>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                        <button type="submit" class="fxt-btn-fill">Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="fxt-footer">
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
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image-input").change(function() {
                readURL(this);
            });



        });
    </script>
@endpush
