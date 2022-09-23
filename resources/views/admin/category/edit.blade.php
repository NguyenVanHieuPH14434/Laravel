@extends('layouts.admin.master')
@section('title', 'Cập nhật Category')
@section('titleContent', 'Cập nhật Category')
@section('content')
    <form action="{{ route('categories.update', $cate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{$cate->name?$cate->name:old('name')}}">
            <input type="hidden" class="form-control" name="id" id="" value="{{$cate->id}}">
            @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="mb-3">
            <label for="name">Image</label>
            <input type="file" class="form-control" name="image" id="">
            <img src="{{asset($cate->image)}}" width="80px" alt="">
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
