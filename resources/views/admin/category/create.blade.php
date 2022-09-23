@extends('layouts.admin.master')
@section('title', 'Tạo mới Category')
@section('titleContent', 'Tạo mới Category')
@section('content')
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{old('name')}}" name="name" id="">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name">Image</label>
            <input type="file" class="form-control" name="image" id="">
            @error('image')
            <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
