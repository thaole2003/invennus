@extends('admin.layouts.master')
@section('content')
    <div class="m-10">
        <h1 class="text-center">Danh sách cửa hàng</h1>
    </div>
    {{-- <div>

        @if (session('msg'))
            @if (session('msg')['success'])
                <div class="alert alert-success">{{ session('msg')['message'] }}</div>
            @else
                <div class="alert alert-danger">{{ session('msg')['message'] }}</div>
            @endif
        @endif

    </div> --}}
    <div class="w-80">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cua Hanf</th>
                    <th scope="col">San pham</th>
                    <th scope="col">So luong</th>
                    <th scope="col">So luong</th>

                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $value)
                        <tr>
                            <th scope="">{{ $key + 1 }}</th>
                            <td>{{ $value->store->name }}</td>
                            <td>{{ $value->productVariant->product_id }}</td>


                            <td class="d-flex align-items-center">
                                <form action="{{ route('admin.storeVariant.update', $value->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="number" name="quantity" value="{{ $value->quantity }}">
                                    <button type="submit"class="btn btn-danger" class="btn btn-danger"><i
                                            class="fas fa-trash-alt"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Bạn cần thêm 1 cửa hàng!</td>
                    </tr>
                @endif


            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
