@extends('client.layouts.master')

@section('content')
<section class="cart-area ptb-60" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="cart-table table-responsive">
                    <div class="billing-details">
                        <h3 class="title">Cập nhật thông tin nhận hàng</h3>
                    <form action="{{ route('bill-client-update',$bills->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row pt-5">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Họ tên người nhận <span class="required">*</span></label>
                                    <input name="name" value="{{ $bills->name }}" type="text"
                                        class="form-control">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input name="address" type="text" value="{{ $bills->address }}"
                                        class="form-control">
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Địa chỉ email <span class="required">*</span></label>
                                    <input name="email" type="email" value="{{ $bills->email }}"
                                        class="form-control">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input name="phone" type="text" value="{{ $bills->phone }}"
                                        class="form-control">
                                        @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary">Cập nhật</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
