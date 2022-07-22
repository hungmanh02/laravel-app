@extends('Client.layouts.app')
@section('title','Checkout')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ route('index') }}">Trang chủ</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->


        <div class="register-req">
            <p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng để được xem lại lịch sử mua hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điều thông tin gửi hàng</p>
                        <div class="form-one">
                            <form action="{{ route('save-checkout') }}" method="POST">
                                @csrf
                                {{-- <input type="text" placeholder="Company Name"> --}}
                                {{-- <input type="text" placeholder="First Name *"> --}}
                                {{-- <input type="text" placeholder="Last Name *"> --}}
                                {{-- <input type="text" placeholder="Address 2"> --}}
                                <input type="email" placeholder="Email*"name="shipping_email">
                                <input type="text" placeholder="Họ và Tên"name="shipping_name">
                                <input type="text" placeholder="Địa chỉ"name="shipping_ddress">
                                <input type="text" placeholder="Phone"name="shipping_phone">
                                <div class="order-message">
                                    <p>Ghi chú đơn hàng</p>
                                    <textarea name="shipping_notes"  placeholder="Ghí chú thông tin đơn hàng của bạn" rows="5"></textarea>
                                    {{-- <label><input type="checkbox"> Shipping to bill address</label> --}}
                                </div>
                                <input type="submit" value="Thanh toán" name="thanh-toan" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                    </div>
                </div>				
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng & Thanh toán</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('uploads/product/'.$item->options->image) }}" alt="" width="100px"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $item->name }}</a></h4>
                            {{-- <p>Web ID: 1089772</p> --}}
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($item->price).' '.'vnđ' }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{ route('quantity-product-cart',$item->rowId) }}" method="POST">
                                    @csrf
                                    {{-- <a class="cart_quantity_up" href=""> + </a> --}}
                                    <input class="cart_quantity_input" type="number" name="quantity" value="{{ $item->qty }}">
                                    <input type="hidden" value="{{ $item->rowId }}" name="rowId">
                                    <input type="submit" value="Cập nhật" name="update-qty">
                                    {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ number_format($item->qty*$item->price).' '.'vnđ' }} </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{route('delete-product-cart',$item->rowId ) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td>{{ Cart::priceTotal(0, ',', '.').' '.'vnđ' }}</td>
                                </tr>
                                <tr>
                                    <td>Thuế</td>
                                    <td>{{ Cart::tax(0, ',', '.').' '.'vnđ' }}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Thành tiền</td>
                                    <td><span>{{ Cart::total(0, ',', '.').' '.'vnđ' }}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->
@endsection