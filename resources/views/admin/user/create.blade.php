@extends('admin.layouts.master')
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
    Thêm người dùng</h1>

    <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row mx-2">
            <div class="col-md-8">

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter name" name="name"
                        value="{{ old('name') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter slug" name="email"
                        value="{{ old('email') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">SĐT:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter slug" name="phone"
                        value="{{ old('phone') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter slug" name="address"
                        value="{{ old('address') }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Password:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter slug" name="password"
                        value="{{ old('password') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-3">
                    <label for="email" class="form-label">Chức danh :</label>
                    <div class="radio-container">
                        <input type="radio" id="option1" name="role" value="user">
                        <label for="option1">Người dùng</label>
                    </div>

                    <div class="radio-container">
                        <input type="radio" id="option2" name="role" value="employee">
                        <label for="option2">Quản lí</label>
                    </div>

                    <div class="radio-container">
                        <input type="radio" id="option3" name="role" value="admin">
                        <label for="option3">Admin</label>
                    </div>
                </div>

                <div class="mb-3 mt-3" id="storeSelectContainer" style="display: none;">
                    <label for="email" class="form-label">Cửa hàng : </label>
                    <select name="store_id" id="storeSelect">
                        <option value="">-- Chọn cửa hàng --</option>
                        @foreach ($data as $store)
                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Image:</label>
                    <input type="file" class="form-control" name="avt" accept="image/*" id="image-input"
                        placeholder="Enter title" value="{{ old('avt') }}">
                </div>
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
