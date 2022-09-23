@extends('layouts.admin.master')
@section('title', 'Quản lý Category')
@section('titleContent', 'Quản lý Category')
@section('content')
    <div class="mb-3">
        @if (session('message'))
        <h3 class="text-success">{{session('message')}}</h3>
        @endif
    </div>
    <table class="table">
        <div class="mb-3">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Tạo mới</a>
        </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($cates as $item)
           <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>

                <td>
                        <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                </td>
        </tr>
           @endforeach
        </tbody>
    </table>
    {{ $cates->links() }}
@endsection
