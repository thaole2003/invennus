@extends('admin.layouts.master')
@section('content')
    <div class="col-xl-12">
        <form class="d-flex gap-2 mb-2" action="{{ route('filter-revenue') }}" method="post">
            @csrf
            @method('post')
            <div class="">
                <label for="example-disable" class="form-label">Bắt đầu</label>
                <input type="date" name="date_start" class="form-control" value="{{ Session::get('date_start') }}">
            </div>
            <div class="">
                <label for="example-disable" class="form-label">Kết thúc</label>
                <input type="date" name="date_end" class="form-control" value="{{ Session::get('date_end') }}">
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
        var revenueData = {!! json_encode($revenueData) !!};
        var months_years = {!! isset($months_years) ? json_encode($months_years) : '[]' !!};

        if (months_years.length > 0) {
            var data = months_years.map(function(month_year) {
                var monthData = revenueData.find(function(item) {
                    // Lấy phần tháng và năm từ chuỗi ngày
                    var itemMonthYear = item.date.substring(5, 7) + '-' + item.date.substring(0, 4);
                    return itemMonthYear === month_year.month + '-' + month_year.year;
                });

                return {
                    month: month_year.month + '-' + month_year.year,
                    revenue: monthData ? monthData.revenue : 0
                };
            });

            new Morris.Bar({
                element: 'morris-bar-example',
                data: data,
                xkey: 'month',
                ykeys: ['revenue'],
                labels: ['Doanh thu'],
                barColors: ['#4e73df'],
                hoverCallback: function(index, options, content, row) {
                    var color = options.barColors[index];
                    return '<div style="color:' + color + '">' + content + '</div>';
                },
                hideHover: 'auto',
                resize: true,
                xLabelAngle: 35,
            });
        } else {
            // Xử lý khi không có dữ liệu
            console.error('Không có dữ liệu để hiển thị.');
        }
    </script>
@endpush
