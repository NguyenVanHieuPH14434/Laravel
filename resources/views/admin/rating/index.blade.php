@extends('layouts.admin.master')
@section('title', 'Quản lý Rating')
@section('titleContent', 'Quản lý Rating')
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
                <th>Preview</th>
                <th>Rating</th>
                <th>Product</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
           @foreach ($ratings as $item)
           <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->preview}}</td>
                <td>
                    @if ($item->rating == 1)
                    <label for="5">☆</label>
                    @elseif($item->rating == 2)
                    <label for="5">☆☆</label>
                    @elseif($item->rating == 3)
                    <label for="5">☆☆☆</label>
                    @elseif($item->rating == 4)
                    <label for="5">☆☆☆☆</label>
                    @elseif($item->rating == 5)
                    <label for="5">☆☆☆☆☆</label>
                    @endif
                </td>
                <td>{{$item->product->name}}</td>
                {{-- <td>
                    <form action="{{ route('orders.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td> --}}
        </tr>
           @endforeach
        </tbody>
    </table>
    {{ $ratings->links() }}
@endsection
