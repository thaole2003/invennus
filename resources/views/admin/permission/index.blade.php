@extends('admin.layouts.master')
@section('title')
    Quyền
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách quyền</h1>
    </div>
    <div>

        @if (session('msg'))
            @if (session('msg')['success'])
                <div class="alert alert-success">{{ session('msg')['message'] }}</div>
            @else
                <div class="alert alert-danger">{{ session('msg')['message'] }}</div>
            @endif
        @endif

    </div>
    <a href="{{ route('admin.permissions-import') }}" class="btn btn-primary my-4 mx-4">Import quyền</a>
    <a href="{{ route('admin.permissions-export') }}" class="btn btn-secondary my-4">Export quyền</a>
    <div class="w-80">
        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên quyền</th>
                    <th scope="col">Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td scope="">{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td class="d-flex align-items-center " style="gap: 0.5rem;">
                            <a class="btn btn-primary" href="{{ route('admin.permissions.edit', $value->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.permissions.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('chắc chắn xóa?')" class="btn btn-danger"
                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
