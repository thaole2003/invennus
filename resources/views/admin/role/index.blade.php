@extends('admin.layouts.master')
@section('title')
    Vai trò và quyền
@endsection
@section('content')
    <div class="m-10">
        <h1 class="text-center">Vai trò và quyền</h1>
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
    <div class="w-80">
        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col">Quyền</th>
                    <th scope="col">Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $value)
                    <tr>
                        <td scope="">{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            @foreach ($value->permissions as $perm)
                                <span class="badge rounded-pill bg-danger text-white"> {{ $perm->name }}</span>
                            @endforeach
                        </td>
                        <td class="d-flex align-items-center " style="gap: 0.5rem;">
                            <a class="btn btn-primary" href="{{ route('admin.roles.edit', $value->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.roles.destroy', $value->id) }}" method="POST">
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
