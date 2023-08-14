@extends('admin.layouts.master')
@section('title')
    User
@endsection
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
    Sửa người dùng</h1>

    <form action="{{ route('admin.users.update',$model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mx-2">
            <div class="col-md-8">

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter name" name="name"
                        value="{{ $model->name }}">
                </div>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter slug" name="email"
                        value="{{$model->email  }}">
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">SĐT:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter slug" name="phone"
                        value="{{ $model->phone  }}">
                </div>
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter slug" name="address"
                        value="{{ $model->address  }}">
                </div>
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="mb-3 mt-3" hidden>
                    <label for="email" class="form-label">Password:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter slug" name="password"
                        value="{{ $model->password  }}">
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="mt-3">
                    <label for="email" class="form-label">Chức danh :</label>
                    <div class="radio-container">
                        <input type="radio" id="option1" name="role" {{ $model->role == 'user' ? 'checked' : '' }} value="user">

                        <label for="option1">Người dùng</label>
                    </div>

                    <div class="radio-container">
                        <input type="radio" id="option2" name="role"  {{ $model->role == 'employee' ? 'checked' : '' }} value="employee">
                        <label for="option2">Quản lí</label>
                    </div>

                    <div class="radio-container">
                        <input type="radio" id="option3" name="role" {{ $model->role == 'admin' ? 'checked' : '' }} value="admin">
                        <label for="option3">Admin</label>
                    </div>
                </div>

                <div class="mb-3 mt-3" id="storeSelectContainer" style="display: {{ $model->role == 'employee' ? 'block' : 'none' }}">
                    <label for="email" class="form-label">Cửa hàng : </label>
                    <select name="store_id" id="storeSelect">
                        <option value="">-- Chọn cửa hàng --</option>
                        @foreach ($data as $store)
                            <option {{ $model->store_id == $store->id ? 'selected' : '' }} value="{{ $store->id }}">{{ $store->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('store_id')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Image:</label>
                    <input type="text" name="current_avt" value="{{ $model->avt }}" hidden>
                    <input type="file" class="form-control" name="new_avt" accept="image/*" id="image-input"
                        placeholder="Enter title" value="{{ old('avt') }}">
                </div>
                @error('avt')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="mb-3 mt-3" style="text-align:center;">
                    <img src="" style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;"
                        id="show-image" alt="">
                </div>

            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        {{-- <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">


        </div> --}}
    </form>
@endsection

@push('scripts')
<script>
    const roleRadios = document.querySelectorAll('input[name="role"]');
    const storeSelectContainer = document.getElementById('storeSelectContainer');

    roleRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'employee') {
                storeSelectContainer.style.display = 'block';
            } else {
                storeSelectContainer.style.display = 'none';
            }
        });
    });
</script>
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
