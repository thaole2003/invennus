@extends('layouts.app')

@section('content')
    <div class="fxt-content">
        <div class="fxt-header">
        </div>
        <div class="fxt-form">
            <div class="fxt-transformY-50 fxt-transition-delay-1">
                <h2>Cập nhật thông tin</h2>
            </div>
            <div class="fxt-transformY-50 fxt-transition-delay-2">
                <p>Nhập thông tin thay</p>
            </div>
            <form method="POST" action="{{ route('changeInfo',auth()->user()->id) }}" enctype="multipart/form-data">
                @csrf
                @method('post') <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        <input id="name" type="text" placeholder="Tên của bạn"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') ? old('name') : auth()->user()->name  }}" autocomplete="name" autofocus>
                        <i class="flaticon-user"></i>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        <input id="email" type="email" placeholder="Địa chỉ email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ auth()->user()->email  }}" autocomplete="email">
                        <i class="flaticon-envelope"></i>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        <input id="phone" type="text" placeholder="Số điện thoại"
                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                            value="{{ auth()->user()->phone  }}" autocomplete="phone">
                        <i class="flaticon-envelope"></i>
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
                            value="{{ auth()->user()->address }}" autocomplete="phone">
                        <i class="flaticon-envelope"></i>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="file form-group clearfix d-flex align-items-center gap-5">
                    <input type="hidden" name='old_avatar' value="{{ auth()->user()->avt }}">
                <div class="d-flex h-25 ">
                    <label for="file">Chọn ảnh đại diện mới
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
                    </label>
                    <div class="d-flex align-items-center gap-5 ">
                        <input id="file" type="file" class="form-control mr-2 @error('new_avatar') is-invalid @enderror" name="new_avatar" value="{{ old('avatar') }}"  autocomplete="email"/>
                        @error('new_avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="mb-3 mt-3" style="text-align:center;">
                    <img src="" style="width: 70px;min-height:70px;border-radius:100% ;     object-fit: cover;"
                        id="show-image" alt="">
                </div> --}}
                <style>
                    input[type=file] { display: none; }
                    label[for=file] {
                        display: grid;
                        grid-auto-flow: column;
                        grid-gap: .5em;
                        justify-items: center;
                        align-content: center;
                        padding: .85em 1.5em;
                        border-radius: 2em;
                        border: .2px solid gainsboro;
                        transition: 1s;
                        &:hover, &:focus, &:active {
                            background: #F4A460;
                            color:black;
                        }
                    }
                </style>
            </div>
                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                        <button type="submit" class="fxt-btn-fill">Cập nhật</button>
                    </div>
                </div>
            </form>
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
