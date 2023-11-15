@extends('admin.layouts.master')
@section('content')
    <div class="col-xl-12">
        <form class="d-flex gap-2 mb-2" action="{{ route('filter-revenue') }}" method="post">
            @csrf
            @method('post')
            <div class="">
                <label for="example-disable" class="form-label">Bắt đầu</label>
                <input type="datetime-local" name="date_start" class="form-control" value="{{ Session::get('date_start') }}">
            </div>
            <div class="">
                <label for="example-disable" class="form-label">Kết thúc</label>
                <input type="datetime-local" name="date_end" class="form-control" value="{{ Session::get('date_end') }}">
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

        // Tạo mảng với 12 tháng, và thiết lập giá trị ban đầu của doanh thu là 0
        var data = Array.from({
            length: 12
        }, function(_, i) {
            var monthData = revenueData.find(function(item) {
                return item.month === (i + 1);
            });

            if (monthData) {
                return {
                    month: "Tháng " + (i + 1),
                    revenue: monthData.revenue
                };
            } else {
                return {
                    month: "Tháng " + (i + 1),
                    revenue: 0
                };
            }
        });

        new Morris.Bar({
            element: 'morris-bar-example',
            data: data,
            xkey: 'month',
            ykeys: ['revenue'],
            labels: ['Doanh thu'],
            barColors: ['#ffbd4a'],
            hideHover: 'auto',
            resize: true,
            xLabelAngle: 35,
            xLabelAngle: 60, // Đổi góc xLabel nếu cần
        });
    </script>
    {{-- <script>
        // var revenueData = {!! json_encode($revenueData) !!};

        $(function() {
            var startDate = null;
            var endDate = null;

            // Tạo datepicker cho ngày bắt đầu và ngày kết thúc
            $("#start-date").datepicker();
            $("#end-date").datepicker();

            // Khi người dùng thay đổi ngày bắt đầu
            $("#start-date").on("change", function() {
                startDate = $("#start-date").datepicker("getDate");
                updateChart(startDate, endDate);
            });

            // Khi người dùng thay đổi ngày kết thúc
            $("#end-date").on("change", function() {
                endDate = $("#end-date").datepicker("getDate");
                updateChart(startDate, endDate);
            });

            // Hàm cập nhật biểu đồ
            function updateChart(start, end) {
                // Nếu cả hai ngày bắt đầu và kết thúc đã được chọn
                if (start && end) {
                    // Gửi yêu cầu Ajax để lấy dữ liệu doanh thu trong khoảng thời gian
                    $.ajax({
                        url: '/filter',
                        type: 'POST',
                        data: {
                            date_start: start,
                            date_end: end
                        },
                        success: function(response) {
                            // Xử lý kết quả trả về từ máy chủ và cập nhật biểu đồ
                            updateChartWithData(response);
                        }
                    });
                } else {
                    // Sử dụng dữ liệu toàn bộ (không lọc)
                    updateChartWithData(revenueData);
                }
            }

            // Hàm cập nhật biểu đồ với dữ liệu
            function updateChartWithData(data) {
                // Chuyển dữ liệu sang định dạng phù hợp với biểu đồ và cập nhật biểu đồ
                var dataForChart = data.map(function(item) {
                    return {
                        month: "Tháng " + item.month,
                        revenue: item.revenue
                    };
                });

                new Morris.Bar({
                    element: 'morris-bar-example',
                    data: dataForChart,
                    xkey: 'month',
                    ykeys: ['revenue'],
                    labels: ['Doanh thu'],
                    barColors: ['#ffbd4a'],
                    hideHover: 'auto',
                    resize: true,
                    xLabelAngle: 35,
                    xLabelAngle: 60, // Đổi góc xLabel nếu cần
                });
            }
        });
    </script> --}}
@endpush
