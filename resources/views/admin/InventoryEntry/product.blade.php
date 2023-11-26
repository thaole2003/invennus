@extends('admin.layouts.master')
@section('content')
    <div class="col-xl-12">
        <form class="d-flex gap-2 mb-2" action="{{ route('filter-product') }}" method="post">
            @csrf
            @method('post')
            <div class="">
                <label for="example-disable" class="form-label">Bắt đầu</label>
                <input type="date" name="date_start" class="form-control" value="{{ Session::get('date_start1') }}">
            </div>
            <div class="">
                <label for="example-disable" class="form-label">Kết thúc</label>
                <input type="date" name="date_end" class="form-control" value="{{ Session::get('date_end1') }}">
            </div>
            <div class="" style="margin-top:32px;margin-left:10px">
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
                <h4 class="header-title mt-0">Top 5 sản phẩm bán chạy nhất</h4>
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
                product_sku: product.product_sku, // Thay product_sku bằng tên cột thực tế trong dữ liệu của bạn
                total_quantity: product.total_quantity,
                price: product.total_amount // Thay total_amount bằng tên cột thực tế trong dữ liệu của bạn
            };
        });

        new Morris.Bar({
            element: 'morris-bar-example',
            data: data,
            xkey: 'product_sku',
            ykeys: ['total_quantity'],
            labels: ['Số lượng'],
            barColors: ['#4e73df'],
            hideHover: 'auto',
            resize: true,
            xLabelAngle: 0,
            hoverCallback: function(index, options, content, row) {
                var formattedPrice = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(row.price);

                var tooltipContent = '<div class="morris-hover-row-label">' + row.product_sku + '</div>' +
                    '<div class="morris-hover-point" style="color: #ffbd4a">Số lượng: ' + row.total_quantity +
                    '</div>' +
                    '<div class="morris-hover-point" style="color: #ffbd4a">Giá: ' + formattedPrice + '</div>';

                return tooltipContent;
            }
        });
    </script>
@endpush
