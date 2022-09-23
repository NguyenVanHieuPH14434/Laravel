@extends('layouts.client.master')
@section('title', 'Shopping Cart')
@section('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('shop') }}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                @if (Session::has('cart') != null)
                                @php
                                $total = 0;
                            @endphp
                                    @foreach (Session::get('cart')->products as $key => $item)
                                        @php
                                            $total += $item['quanty'] *  $item['productInfor']->price ;
                                        @endphp

                                <tr id="dataCart">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset($item['productInfor']->image)}}" width="100px" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $item['productInfor']->name}}</h6>
                                            <h5>{{ number_format($item['productInfor']->price)}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" data-id="{{ $item['productInfor']->id}}" id="cart-item-{{ $item['productInfor']->id}}"  value="{{ $item['quanty']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{ number_format($item['quanty'] *  $item['productInfor']->price) }}</td>
                                    <td class="cart__close">
                                        <a href="javascript:" onclick="deleteCart({{ $item['productInfor']->id}})"><i class="fa fa-close"></i></a>
                                    </td>
                                </tr>
                                @endforeach


                                @else
                                <tr>
                                    <td>Giỏ hàng trống!</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    @if (Session::has('cart') != null)

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="javascript:" onclick="updateCart()" id="updateCart"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>

                    </div>
                    @endif
                </div>


                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            {{-- <li>Subtotal <span>$ 169.50</span></li> --}}
                            @if (Session::has('cart') != null)

                            {{-- <li>Total <span>{{number_format(Session::get('cart')->totalPrice)}}</span></li> --}}
                            <li>Total <span>{{number_format($total)}}</span></li>
                            @else
                            <li>Total <span>0Đ</span></li>
                            @endif
                        </ul>
                        @if(Auth::check())
                        <a href="/checkout" class="primary-btn">Proceed to checkout</a>
                        @else
                        <a class="nav-link text-danger" href="{{ route('auth.loginform') }}">Đăng nhập để thanh toán</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->


    <script>
        function deleteCart(id) {
            $.ajax({
                type: "GET",
                url: "deleteCart/"+id,
            }).done(function(response){
                // alertify.success('Delete Success');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Delete Success!',
                    showConfirmButton: false,
                    timer: 1500
                    });
                // location.reload();
                setInterval(function() {
            location.reload();
        }, 1100);
            });
         }

    </script>
    <script>
        // $('#updateCart').on("click", function(){
        //     alert('a');
        // });
        function updateCart() {
            let lists = [];
            $("table tbody tr td").each(function(){
                $(this).find("input").each(function(){
                    let element = {key: $(this).data('id'), value: $(this).val()};
                    lists.push(element);
                });
            });

            $.ajax({
                type: "POST",
                url: "cart-save-all",
                data:{
                    '_token': "{{ csrf_token() }}",
                    'data': lists
                }
            }).done(function(response){
                // console.log(response.status);
                if(response.status){
                    // alertify.error('Số lượng hàng không đủ!');
                    alertify.error('Vui lòng đặt số lượng hàng nhỏ hơn '+ response.status.kho + '!');
                }else {

                    alertify.success('Update Cart Success!');
                }
                // alertify.success('Update Success');
                // Swal.fire({
                //     position: 'top-end',
                //     icon: 'success',
                //     title: 'Delete Success!',
                //     showConfirmButton: false,
                //     timer: 1500
                //     });
                // location.reload();
                // setInterval(function() {
                    location.reload();
                // }, 1500);
                // alert('ok');
            });
        //    }
         }
    </script>

<script>
    @if (session('message'))
    Swal.fire({
       position: 'top-end',
       icon: 'error',
       title: '{{session('message')}}',
       showConfirmButton: false,
       timer: 1500
       })
   @endif
</script>
@endsection
