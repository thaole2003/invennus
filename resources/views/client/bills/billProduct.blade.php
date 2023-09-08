@extends('client.layouts.master')

@section('content')
    <!-- Start Cart Area -->
    <section class="cart-area ptb-60" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sumTotal = 0;
                                ?>
                                @foreach ($bills->billDetail as $key => $value)
                                    <tr>
                                        <form>

                                            <td>{{ $key + 1 }}</td>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset($value->ProductVariant->product->image) }}"
                                                        alt="item">
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <a href="#">{{ $value->ProductVariant->product->title }}</a>
                                                <ul>
                                                    <li>Color: <strong>{{ $value->ProductVariant->color->name }}</strong>
                                                    </li>
                                                    <li>Size: <strong>{{ $value->ProductVariant->size->name }}</strong></li>
                                                    <li>Material: <strong>Cotton</strong></li>
                                                </ul>
                                            </td>

                                            <td class="product-price">
                                                <span class="unit-amount">{{ number_format($value->ProductVariant->price) }}
                                                    vnd</span>

                                            </td>

                                            <td class="product-quantity">
                                                <span class="unit-amount">{{ $value->quantity }}
                                                </span>

                                            </td>
                                        </form>

                                        <td class="product-subtotal">
                                            <span
                                                class="subtotal-amount">{{ number_format($value->quantity * $value->ProductVariant->price) }}
                                                vnd</span>

                                        </td>

                                        <div class="d-none">
                                            {{ $sumTotal += $value->quantity * $value->ProductVariant->price }}</div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="row align-items-center">
                        <div class="col-lg-7 col-md-7">
                            <div class="continue-shopping-box">
                                <span>${{ number_format($sumTotal) }} vnd</span>
                                <a href="#" class="btn btn-light">Continue Shopping</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="cart-totals">
                    <h3>Bill Totals</h3>

                    <ul>
                        <li>Subtotal <span>${{ number_format($sumTotal) }} vnd</span></li>
                        <li>Shipping <span>0</span></li>
                        <li>Total <span><b>{{ number_format($sumTotal) }} vnd</b></span></li>
                    </ul>
                    {{-- <a href="{{ route('checkout') }}" class="btn btn-light">Proceed to Checkout</a> --}}
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Cart Area -->
@endsection
