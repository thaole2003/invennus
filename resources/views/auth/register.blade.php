@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="avt" class="col-md-4 col-form-label text-md-end">{{ __('Ảnh đại diện') }}</label>

                            <div class="col-md-6">
                                <input  type="file" class="form-control @error('avt') is-invalid @enderror" name="avt" value="{{ old('avt') }}" required autocomplete="avt" autofocus  accept="image/*" id="image-input">

                                @error('avt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3" style="text-align:center;">
                            <img src="" style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;"
                                 id="show-image" alt="">
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="fxt-content">
        <div class="fxt-header">
            {{-- <a href="login-29.html" class="fxt-logo"><img src="img/logo-29.png" alt="Logo"></a> --}}
            {{-- <a href="login-29.html" class="fxt-logo"><img src="{{ asset('authen/img/logo-29.png') }}" alt="Logo"></a> --}}

        </div>
        <div class="fxt-form">
            <div class="fxt-transformY-50 fxt-transition-delay-1">
                <h2>Register</h2>
            </div>
            <div class="fxt-transformY-50 fxt-transition-delay-2">
                <p>Create an account free and enjoy it</p>
            </div>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        {{-- <input type="text" class="form-control" name="name" placeholder="Name" required="required"> --}}
                        <input id="name" type="text" placeholder="Name"
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
                        <input id="email" type="email" placeholder="Email Address"
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
                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                        {{-- <input type="password" class="form-control" name="password" placeholder="Password"
                            required="required"> --}}
                        <input id="password" type="password" placeholder="Password"
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
                            autocomplete="new-password" placeholder="Re - Password">
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
                        <button type="submit" class="fxt-btn-fill">Register</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="fxt-footer">
            <div class="fxt-transformY-50 fxt-transition-delay-8">
                <h3>Or Login With:</h3>
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
