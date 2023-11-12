@extends('layouts.app')

@section('content')
    <div class="fxt-content">
        <div class="fxt-header">
        </div>
        <div class="fxt-form">
            <div class="fxt-transformY-50 fxt-transition-delay-1">
                <h2>Đổi mật khẩu</h2>
            </div>
            <div class="fxt-transformY-50 fxt-transition-delay-2">
                <p>Nhập thông tin để cập nhật mật khẩu</p>
            </div>
            <form method="POST" action="{{ route('changePassword',auth()->user()->id) }}">
                @csrf
                @method('post')
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-5">
                        {{-- <input type="password" class="form-control" name="password" placeholder="Password" required="required"> --}}
                        <input id="password" type="password" class="form-control @error('old_password') is-invalid @enderror"
                            placeholder="Mật khẩu hiện tại" name="old_password" autocomplete="current-password">
                        <i class="flaticon-padlock"></i>
                        @error('old_password')
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
                            placeholder="Mật khẩu mới" name="password" autocomplete="current-password">
                        <i class="flaticon-padlock"></i>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-5">
                        {{-- <input type="password" class="form-control" name="password" placeholder="Password" required="required"> --}}
                        <input id="password" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Nhập lại mật khẩu" name="password_confirmation" autocomplete="current-password">
                        <i class="flaticon-padlock"></i>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-6">
                        <div class="fxt-content-between">
                            <button type="submit" class="fxt-btn-fill">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
