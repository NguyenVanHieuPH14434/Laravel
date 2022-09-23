@extends('layouts.admin.master')
@section('title', 'Quản lý Comment')
@section('titleContent', 'Quản lý Comment')
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
                <th>Comment</th>
                <th>Product</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($cmts as $item)
           <tr>

                <td>{{$item->id}}</td>
                <td>{{$item->comment}}</td>
                <td>{{$item->product->name}}</td>
                <td>
                    <a href="{{ route('comments.details', $item->id) }}" class="btn btn-primary">Xem chi tiết</a>
                    <form action="{{ route('comments.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td>
        </tr>
           @endforeach
        </tbody>
    </table>
    {{ $cmts->links() }}
@endsection
