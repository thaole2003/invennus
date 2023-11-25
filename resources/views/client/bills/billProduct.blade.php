@extends('client.layouts.master')

@section('content')
    <!-- Start Cart Area -->
    <section class="cart-area ptb-60" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <a class="btn btn-primary mb-5" href="{{ route('bill.index') }}">Trở lại</a>
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sumTotal = 0;
                                ?>
                                @foreach ($billDetail as $key => $value)
                                    <tr>
                                        {{-- <form> --}}

                                            <td>{{ $key + 1 }}</td>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset($value->product_image) }}"
                                                        alt="item">
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <a href="#">{{ $value->product_name }}</a>
                                                <ul>
                                                    <li>Màu: <strong>{{ $value->color }}</strong>
                                                    </li>
                                                    <li>Kích cỡ: <strong>{{ $value->size}}</strong></li>
                                                    <li>Giá: <strong>{{ number_format($value->price)}} VND</strong></li>
                                                    {{-- <li>Material: <strong>Cotton</strong></li> --}}
                                                </ul>
                                            </td>



                                            <td class="product-quantity">
                                                <span class="unit-amount">{{ $value->quantity }}
                                                </span>

                                            </td>

                                        <div class="d-none">
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Cart Area -->
@endsection
