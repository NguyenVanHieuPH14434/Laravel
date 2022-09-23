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
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>List Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="container mb-lg-5">
            <div class="row">
                <div class="col-lg-12">

                        <h3 class="mb-3" >Danh sách đơn hàng</h3>

                        <div class="shop__sidebar__search" style="margin-bottom: 20px">
                            <form action="{{route('orderSearch')}}" method="GET">
                                <input type="text" name="key" style="border: 1px solid #ccc; border-radius: 5px " id="key" placeholder="Search...">
                                <input type="hidden" name="uui" id="uui" value="{{Auth::user()->id}}">
                                <button type="submit" id="button-search"><span class="icon_search"></span></button>
                            </form>
                        </div>

                        <div class="list-group" id="orderList">
                            @forelse ($listOrders as $item)


                                <a href="{{route('listOrderDetails', $item->id)}}" class="list-group-item list-group-item-action list-group-item-primary"><label for="">Mã đơn hàng:</label> {{$item->code_order}}</a>

                                @empty
                                <li><p>Không có đơn hàng nào!</p></li>

                                @endforelse
                            </div>

                    </div>

<div class="mt-lg-3">

</div>


            </div>
        </div>
    {{-- </section> --}}
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

    <script>
        $(document).on('keyup', '#key', function (e) {
            e.preventDefault();

            key = $(this).val();
            uui = $('#uui').val();

            console.log(key);
            $.ajax({
                type: "GET",
                url: "{{route('orderSearch')}}",
                data: {
                    key: key,
                    // uui: uui,
                },
                success: function (response) {
                    $('#orderList').html(response);
                }
            });
        });
    </script>
@endsection
