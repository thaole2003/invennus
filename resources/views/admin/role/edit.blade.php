@extends('admin.layouts.master')
@section('title')
    Cập nhật vai trò
@endsection
@section('content')
    <h1 class=" d-flex justify-content-center align-items-center" style="height: 80px">
        Cập nhật vai trò</h1>

    <form action="{{ route('admin.roles.update', $role->id) }}" method="post">
        @csrf
        @method('put')
        <div class="w-50 mx-auto border bg-light rounded h-100 p-4 mt-5">
            <div class="mb-3 mt-3">
                <label class="form-label">Tên vai trò</label>
                <input type="text" class="form-control" placeholder="Nhập tên vai trò" name="name"
                    value="{{ old('name', $role->name) }}">
            </div>
            <div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                <label class="form-check-label" for="flexCheckDefaultAll">Tất cả quyền</label>
            </div>

            <div class="col-12 my-4">
                <div class="row">
                    <?php
                    $abc = '';
                    $len = count($permissions);
                    ?>
                    @foreach ($permissions as $key => $value)
                        <?php
                        if ($key === 0) {
                            echo '<div class="col-4">';
                        }

                        if ($abc != substr($value->name, 0, strpos($value->name, '-')) && $key === 0) {
                            $abc = substr($value->name, 0, strpos($value->name, '-'));

                            echo '<label>' . $abc . '</label><div class="block">';
                        } elseif ($abc != substr($value->name, 0, strpos($value->name, '-')) && $key !== 0) {
                            $abc = substr($value->name, 0, strpos($value->name, '-'));
                            echo '</div></div><div class="col-md-4">';
                            echo '<label>' . $abc . '</label><div class="block">';
                        }
                        ?>
                        <div class="form-check col-4">
                            <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $value->id }}"
                                id="flexCheckDefault{{ $value->id }}"
                                {{ $role->hasPermissionTo($value->name) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="flexCheckDefault{{ $value->id }}">{{ $value->name }}</label>
                        </div>
                        <?php
                        if ($key === $len - 1) {
                            echo '</div></div>';
                        }
                        ?>
                    @endforeach
                    @error('permission')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
    </form>
@endsection
@push('scripts')
    <script type="text/javascript">
        $('#flexCheckDefaultAll').click(function() {
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked', true);
            } else {
                $('input[type = checkbox]').prop('checked', false);
            }
        });
    </script>
@endpush
