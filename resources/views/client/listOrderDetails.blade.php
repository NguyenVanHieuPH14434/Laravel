@extends('layouts.client.master')
@section('title', 'Shopping Cart')
@section('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Danh sách sản phẩm đơn hàng</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Danh sách sản phẩm đơn hàng</span>
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
                                @php
                                $total = 0;
                                @endphp

                                    @foreach ($listOdDetails as $key => $item)
                                    {{-- @foreach (Session::get('cart')->products as $key => $item) --}}


                                <tr id="dataCart">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset($item->product->image)}}" width="100px" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $item->product->name}}</h6>
                                            <h5>{{ number_format($item->product->price)}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="">
                                                {{-- <input type="text" disabled data-id="{{ $item->id}}" id="cart-item-{{ $item->id}}"  value="{{ $item->quantity}}"> --}}
                                                <h5>{{ $item->quantity}}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{ number_format($item->quantity *  $item->product->price) }} Vnđ</td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h5>Thông tin nhận hàng</h5>

                        <h6>Mã đơn hàng: {{$order->code_order}}</h6>

                            <p><b>Họ và tên:</b> {{$order->name_customer}}</p>
                            <p><b>Email:</b> {{$order->email}}</p>
                            <p><b>SĐT:</b> {{$order->phone}}</p>
                            <p><b>Địa chỉ:</b> {{$order->address}}</p>

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
        }, 1200);
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
                alertify.success('Update Success');
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
         }
    </script>
@endsection
