@extends('admin.layouts.master')
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Cate Add</h1>

    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image" accept="image/*" id="image-input"
                    placeholder="Enter title" value="{{ old('image') }}">
            </div>
            <div class="mb-3 mt-3" style="text-align:center;">
                <img src="" style="width: 120px;min-height:120px;border-radius:100% ;     object-fit: cover;"
                    id="show-image" alt="">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Name:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter name" name="name"
                    value="{{ old('name') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter slug" name="slug"
                    value="{{ old('slug') }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Description :</label>
                <input type="text" class="form-control" id="email" placeholder="Enter description" name="description"
                value="{{ old('description') }}" >
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
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
