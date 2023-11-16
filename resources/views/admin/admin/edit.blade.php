@extends('admin.layouts.master')
@section('title')
    Admin
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Sửa admin</h1>

    <form action="{{ route('admin.admins.update', $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mx-2">
            <div class="col-md-8">

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Họ tên:</label>
                    <input type="text" class="form-control" id="email" placeholder="Nhập tên" name="name"
                        value="{{ $model->name }}">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Nhập email" name="email"
                        value="{{ $model->email }}">
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Số điện thoại:</label>
                    <input type="text" class="form-control" id="email" placeholder="Nhập số điện thoại "
                        name="phone" value="{{ $model->phone }}">
                </div>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Địa chỉ:</label>
                    <input type="text" class="form-control" id="email" placeholder="Nhập địa chỉ" name="address"
                        value="{{ $model->address }}">
                </div>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3" hidden>
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i>Password:</label>
                    <input type="text" class="form-control" id="email" placeholder="Nhập mật khẩu" name="password"
                        value="{{ $model->password }}">
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group mb-3 mt-3">
                    <label for="vaitro" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Vai trò:</label>
                    <select name="roles" class="form-control" id="vaitro">
                        <option selected="" disabled="">Chọn vai trò</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $model->hasRole($role->name) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('roles')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Ảnh đại diện:</label>
                    <input type="text" name="current_avt" value="{{ $model->avt }}" hidden>
                    <input type="file" class="form-control" name="new_avt" accept="image/*" id="image-input"
                        placeholder="Nhập tiêu đề" value="{{ old('avt') }}">
                </div>
                @error('avt')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3" style="text-align:center;">
                    <img src="" style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;"
                        id="show-image" alt="">
                </div>

            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        {{-- <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">


        </div> --}}
    </form>
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
