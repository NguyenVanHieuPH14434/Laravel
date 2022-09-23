@extends('layouts.admin.master')
@section('title', 'Quản lý Order')
@section('titleContent', 'Quản lý Order')
@section('content')
    <div class="mb-3">
        @if (session('message'))
        <h3 class="text-success">{{session('message')}}</h3>
        @endif
    </div>
    <table class="table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Product id</th>
                <th>Order id</th>
                <th>Quantity</th>
                <th>TotalPrice</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
           @foreach ($orderDetails as $item)
            @php
                $total += $item->totalPrice;
            @endphp
           <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->product->name}}</td>
                <td>{{$item->order->code_order}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{number_format($item->totalPrice)}} Vnđ</td>

        </tr>
           @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><b>Tổng</b></td>
            <td >
                <b>{{number_format($total)}} Vnđ</b>
                </td>
            </tr>
        </tfoot>
    </table>
    {{-- {{ $orderDetails->links() }} --}}
    <div class="row">
        <a href="{{ route('orders.index') }}" class="btn btn-secondary" >Back</a>
    </div>
@endsection
