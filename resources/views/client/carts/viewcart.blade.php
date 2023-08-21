@extends('client.layouts.master')

@section('content')
    <!-- Start Cart Area -->
    <section class="cart-area ptb-60" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form>
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="assets/img/img2.jpg" alt="item">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <a href="#">Wood Pencil</a>
                                            <ul>
                                                <li>Color: <strong>Light Blue</strong></li>
                                                <li>Size: <strong>XL</strong></li>
                                                <li>Material: <strong>Cotton</strong></li>
                                            </ul>
                                        </td>

                                        <td class="product-price">
                                            <span class="unit-amount">$191.00</span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="input-counter">
                                                <span class="minus-btn"><i class="fas fa-minus"></i></span>
                                                <input type="text" value="1">
                                                <span class="plus-btn"><i class="fas fa-plus"></i></span>
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">$191.00</span>

                                            <a href="#" class="remove"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>

                                   
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-buttons">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-7">
                                    <div class="continue-shopping-box">
                                        <a href="#" class="btn btn-light">Continue Shopping</a>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-5 text-right">
                                    <a href="#" class="btn btn-primary">Update Cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="cart-totals">
                            <h3>Cart Totals</h3>

                            <ul>
                                <li>Subtotal <span>$2250.00</span></li>
                                <li>Shipping <span>$00.00</span></li>
                                <li>Total <span><b>$2250.00</b></span></li>
                            </ul>
                            <a href="#" class="btn btn-light">Proceed to Checkout</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cart Area -->
@endsection
