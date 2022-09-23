@extends('layouts.admin.master')
@section('title', 'Quản lý OrderDetail')
@section('titleContent', 'Quản lý OrderDetail')
@section('content')

    <table class="table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name Customer</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($orders as $item)
           <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name_customer}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->address}}</td>

                <td>
                        <a href="{{ route('orders.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ route('orderDetails.index', $item->id) }}" class="btn btn-primary">Xem chi tiết</a>

                </td>
        </tr>
           @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}

    <script>
        @if (session('message'))
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{session('message')}}',
            showConfirmButton: false,
            timer: 1500
        })
        @endif
    </script>
@endsection
