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
                <th>Mã đơn hàng</th>
                <th>Quantity</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
           @foreach ($orders as $item)
           <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->code_order}}</td>
                <td>{{count($orders)}}</td>

                {{-- <td>
                        <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                </td> --}}
        </tr>
           @endforeach
        </tbody>
    </table>
    {{-- {{ $orderDetails->links() }} --}}
    <div class="row">
        <a href="{{ route('orders.index') }}" class="btn btn-secondary" >Back</a>
    </div>
@endsection
