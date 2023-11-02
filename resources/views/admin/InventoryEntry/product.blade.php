@extends('admin.layouts.master')
@section('content')
    <div class="col-xl-12">
        <form class="d-flex gap-2 mb-2" action="" method="post">
            @csrf
            @method('post')
            <div class="">
                <label for="example-disable" class="form-label">Bắt đầu</label>
                <input type="datetime-local" name="date_start" class="form-control" value="{{ old('date_start') }}">
            </div>
            <div class="">
                <label for="example-disable" class="form-label">Kết thúc</label>
                <input type="datetime-local" name="date_end" class="form-control" value="{{ old('date_end') }}">
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Xem báo cáo</button>
            </div>
        </form>
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>
                <h4 class="header-title mt-0">Doanh thu theo tháng</h4>
                <div id="morris-bar-example" style="height: 300px;" class="morris-chart"></div>
            </div>
        </div>
    </div><!-- end col -->
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        var topProducts = {!! json_encode($topProducts) !!};

        // Tạo mảng dữ liệu cho biểu đồ
        var data = topProducts.map(function(product) {
            return {
                product_variant_id: product.product_variant_id,
                total_quantity: product.total_quantity
            };
        });

        new Morris.Bar({
            element: 'morris-bar-example',
            data: data,
            xkey: 'product_variant_id',
            ykeys: ['total_quantity'],
            labels: ['Số lượng'],
            barColors: ['#ffbd4a'],
            hideHover: 'auto',
            resize: true,
            xLabelAngle: 35
        });
    </script>
@endpush
