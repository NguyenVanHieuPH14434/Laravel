<div style="width: 900px; margin: 0 auto">

<h2>Xin chào {{$order->name_customer}}</h2>
<h4>Bạn đã đặt hàng tại hệ thống của chúng tôi. Vui lòng kiểm tra lại thông tin đơn hàng của bạn và nhấn vào nút xác nhận đơn hàng</h4>

<h2 style="text-align: center">Thông tin nhận hàng</h2>
<h4>Mã đơn hàng: {{$order->code_order}}</h4>

    <p><b>Họ và tên:</b> {{$order->name_customer}}</p>
    <p><b>Email:</b> {{$order->email}}</p>
    <p><b>SĐT:</b> {{$order->phone}}</p>
    <p><b>Địa chỉ:</b> {{$order->address}}</p>
    <p><b>Tổng tiền: <span>{{number_format($order->totalPrice)}} Vnđ</span> </b> </p>

<h2 style="text-align: center">Danh sách sản phẩm</h2>

<table border="1" style="border-collapse: collapse">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>

    <tbody>


            @foreach ($as->products as $key => $item)


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

        </tr>
        @endforeach

    </tbody>
</table>

<div class="mt-lg-4">
   <p>Vui lòng bấm vào <a href="{{ route('acceptOrder', $order->id) }}" class="btn btn-primary">Xác nhận đơn hàng</a> để xác nhận đơn hàng của bạn!</p>
</div>
</div>
