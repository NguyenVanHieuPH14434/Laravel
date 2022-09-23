@extends('layouts.client.master')
@section('title', 'Checkout')
@section('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input type="text" name="name_customer">
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__input">
                                <p>Note<span>*</span></p>
                                <input type="text" name="note">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" name="address" class="checkout__input__add">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">

                                    @php
                                        $totalPrice = 0;
                                    @endphp

                                    @foreach (Session::get('cart')->products as $key => $item)
                                    @php
                                    $totalPrice += $item['productInfor']->price * $item['quanty'] ;
                                @endphp
                                    <li>{{$key}}. {{Str::limit($item['productInfor']->name, 20, ('...'))}} <span>{{number_format($item['productInfor']->price * $item['quanty'])}} Vnđ</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    @if (Session::has('cart'))
                                    {{-- <li>Total <span>{{number_format(Session::get('cart')->totalPrice)}} Vnđ</span></li> --}}
                                    <li>Total <span><input type="hidden" name="totalPrice" value="{{$totalPrice}}" readonly>{{number_format($totalPrice)}} Vnđ</span></li>
                                    @endif
                                </ul>
                                {{-- <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p> --}}
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                       Thanh toán khi nhận hàng
                                        <input type="checkbox" name="PTTT" id="payment" value="TM" >
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Chuyển khoản
                                        <input type="checkbox" name="PTTT" id="paypal" value="CK">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


@endsection
