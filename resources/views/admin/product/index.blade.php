@extends('layouts.admin.master')
@section('title', 'Quản lý sản phẩm')
@section('titleContent', 'Quản lý sản phẩm')
@section('content')

    {{-- <div class="mb-3">
        @if (session('message'))
            <h3 class="text-success">{{session('message')}}</h3>
        @endif
    </div> --}}
    <table class="table">
        <div class="mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-success">Tạo mới</a>
        </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Price</th>
                <th>Size</th>
                <th>Category</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($products as $item)
           <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{number_format($item->price)}} Vnđ</td>
                <td>{{$item->getSizeName->name}}</td>
                <td>{{$item->getCateName->name}}</td>
                <td><img src="{{asset($item->image)}}" width="80px" alt=""></td>
                <td>
                    @if ($item->status == 1)
                        <a href="{{route('products.changeStatus', $item->id)}}" class="btn btn-primary">Active</a>
                    @else
                        <a href="{{route('products.changeStatus', $item->id)}}" class="btn btn-danger">In-Active</a>
                    @endif
                </td>

                <td>
                        <a href="{{ route('products.edit',$item->id ) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                </td>
        </tr>
           @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
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
