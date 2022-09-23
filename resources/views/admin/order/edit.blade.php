@extends('layouts.admin.master')
@section('title', 'Cập nhật đơn hàng')
@section('titleContent', 'Cập nhật đơn hàng')
@section('content')
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        <div>
            <label for="name">Mã đơn hàng</label>
            <input type="text" class="form-control" name="code_order" id="" value="{{$order->code_order}}" readonly>
        </div>
        <div>
            <label for="name">Name Customer</label>
            <input type="text" class="form-control" name="name_customer" id="" value="{{$order->name_customer}}" readonly>
        </div>
        <div>
            <label for="name">Email</label>
            <input type="text" class="form-control" name="email" id="" value="{{$order->email}}" readonly>
        </div>
        <div>
            <label for="name">Phone</label>
            <input type="text" class="form-control" name="phone" id="" value="{{$order->phone}}" readonly>
        </div>
        <div>
            <label for="name">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="" value="{{$order->address}}" readonly>
            {{-- <textarea name="address" class="form-control summernote" id="" cols="30" rows="10">{!! $order->address !!}</textarea> --}}
        </div>
        <div class="mb-3">
            <label for="name">Status</label>
           <select name="status_id" class="form-control" id="" >
            @foreach ($statuses as $status)
            @if ($order->status_id == $status->id)
            <option selected value="{{$status->id}}">{{$status->name}}</option>
            @else
            <option value="{{$status->id}}">{{$status->name}}</option>
            @endif
            @endforeach
           </select>
        </div>

        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>

@endsection
