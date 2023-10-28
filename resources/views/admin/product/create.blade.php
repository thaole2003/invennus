@extends('admin.layouts.master')
@section('content')
    <h1 class=" bg-info fs-1 d-flex justify-content-center align-items-center text-white rounded" style="height: 100px">
        Thêm sản phẩm</h1>

    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row mx-2">
            <div class="col-md-8">

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Mã sản phẩm:</label>
                    <input type="text" class="form-control" id="" placeholder="SKU" name="sku"
                        value="{{ old('sku') }}">
                </div>
                @error('sku')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Tên:</label>
                    <input type="text" class="form-control" id="" placeholder="Title" name="title"
                        value="{{ old('title') }}">
                </div>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Tên ngắn:</label>
                    <input type="text" class="form-control" id="" placeholder="Meta title" name="metatitle"
                        value="{{ old('metatitle') }}">
                </div>
                @error('metatitle')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Giá chung:</label>
                    <input type="text" class="form-control" id="email" placeholder="Meta title" name="price"
                        value="{{ old('price') }}">
                </div>
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Description :</label>
                    {{-- <textarea class="form-control" placeholder="Enter description" name="description">{{ old('description') }}</textarea> --}}
                    <textarea id="description" name="description" class="form-control" cols="80" rows="10"
                        style="width: 100%;border-radius: 5px;">{{ old('description') }}</textarea>

                </div>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <div class="mb-3 mt-3">
                        <div class="category-container">
                            <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                                    style="color: #ff6666;"></i> Danh mục</label><br>
                            @if (count($store) > 0)
                                @foreach ($categories as $key => $category)
                                    <input type="checkbox" name="category[]" value="{{ $category->id }}" id=""
                                        {{ in_array($category->id, old('category', [])) ? 'checked' : '' }}>
                                    {{ $category->name }} <br>
                                @endforeach
                            @else
                                <span>Hãy thêm 1 cửa hàng!</span>
                            @endif
                        </div>

                    </div>
                </div>
                @error('category.*')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="d-flex j">
                    <div class="mb-3 mt-3">
                        <div class="size-container">
                            <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                                    style="color: #ff6666;"></i>Kích cỡ</label><br>
                            @if (count($sizes) > 0)
                                @foreach ($sizes as $key => $size)
                                    <input type="checkbox" name="size[]" value="{{ $size->id }}" id=""
                                        {{ in_array($size->id, old('size', [])) ? 'checked' : '' }}>
                                    {{ $size->name }} <br>
                                @endforeach
                            @else
                                <span>Hãy thêm 1 cửa hàng!</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <div class="color-container">
                            <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                                    style="color: #ff6666;"></i>Màu sắc</label><br>
                            @if (count($colors) > 0)
                                @foreach ($colors as $key => $color)
                                    <input type="checkbox" name="color[]" value="{{ $color->id }}" id=""
                                        {{ in_array($color->id, old('color', [])) ? 'checked' : '' }}>
                                    {{ $color->name }} <br>
                                @endforeach
                            @else
                                <span>Hãy thêm 1 cửa hàng!</span>
                            @endif
                        </div>
                    </div>

                </div>
                @error('color.*')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('size.*')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Cửa hàng có:</label><br>
                    @if (count($store) > 0)
                        @foreach ($store as $key => $value)
                            <input type="checkbox" name="store_id[]" value="{{ $value->id }}" id=""
                                {{ in_array($value->id, old('store_id', [])) ? 'checked' : '' }}>
                            {{ $value->name }} <br>
                        @endforeach
                    @else
                        <span>Hãy thêm 1 cửa hàng!</span>
                    @endif
                </div>
                @foreach ($errors->get('store_id.*') as $error)
                    <p>{{ $error }}</p>
                @endforeach
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Ảnh sản phẩm ( thêm nhiều ảnh):</label>
                    <input type="file" class="form-control" name="images[]" placeholder="Enter title"
                        value="{{ old('images') }}" multiple>
                </div>
                @error('images[]')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label"><i class="fas fa-star-of-life fa-rotate-180 fa-xs"
                            style="color: #ff6666;"></i> Ảnh chính:</label>
                    <input type="file" class="form-control" name="image" accept="image/*" id="image-input"
                        placeholder="Enter title" value="{{ old('image') }}">
                </div>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        CKEDITOR.replace('description');

        function addColorField() {
            var container = document.querySelector('.color-container');

            var colorDiv = document.createElement('div');
            colorDiv.innerHTML = `
            <input type="text" name="color[]" placeholder="Màu">
            <button class="delete-button" onclick="deleteColorField(this)">Xóa</button>
        `;

            container.appendChild(colorDiv);
        }

        function deleteColorField(button) {
            var container = document.querySelector('.color-container');
            var colorDiv = button.parentElement;

            container.removeChild(colorDiv);
        }

        function addCategoryField() {
            var container = document.querySelector('.category-container');

            var colorDiv = document.createElement('div');
            colorDiv.innerHTML = `
                <input type="text" name="category[]" placeholder="Danh mục">
                <button class="delete-button" onclick="deleteCategoryField(this)">Xóa</button>
            `;

            container.appendChild(colorDiv);
        }

        function deleteCategoryField(button) {
            var container = document.querySelector('.category-container');
            var colorDiv = button.parentElement;

            container.removeChild(colorDiv);
        }

        function addSizeField() {
            var container = document.querySelector('.size-container');

            var sizeDiv = document.createElement('div');
            sizeDiv.innerHTML = `
            <input type="text" name="size[]" placeholder="Kích thước">
            <button class="delete-button" onclick="deleteSizeField(this)">Xóa</button>
        `;

            container.appendChild(sizeDiv);
        }

        function deleteSizeField(button) {
            var container = document.querySelector('.size-container');
            var sizeDiv = button.parentElement;

            container.removeChild(sizeDiv);
        }

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
