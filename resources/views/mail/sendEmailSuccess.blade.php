<div style="width: 900px; margin: 0 auto">

<h2>Xin chào {{$order->name_customer}}</h2>
<h4>Đơn hàng của bạn đã được giao {{$format_date}}</h4>

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


            @foreach ($as as $item)


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
                    <div class="pro-qty-2">
                      <span>{{ $item->quantity}}</span>
                    </div>
                </div>
            </td>
            <td class="cart__price">{{ number_format($item->quantity *  $item->product->price) }}</td>

        </tr>
        @endforeach

    </tbody>
</table>

</div>
