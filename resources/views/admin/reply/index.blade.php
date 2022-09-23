@extends('layouts.admin.master')
@section('title', 'Quản lý Reply')
@section('titleContent', 'Quản lý Reply')
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
                <th>Reply</th>
                <th>Product</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($replies as $item)
           <tr>

                <td>{{$item->id}}</td>
                <td>{{$item->reply}}</td>
                <td>{{$item->product->name}}</td>
                <td>
                    {{-- <a href="{{ route('comments.details', $item->id) }}" class="btn btn-primary">Xem chi tiết</a> --}}
                    <form action="{{ route('replies.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td>
        </tr>
           @endforeach
        </tbody>
    </table>
    {{ $replies->links() }}

    <div class="row">
        <a href="{{ route('comments.index') }}" class="btn btn-secondary" >Back</a>
    </div>
@endsection
