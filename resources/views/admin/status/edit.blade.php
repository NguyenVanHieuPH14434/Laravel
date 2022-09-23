@extends('layouts.admin.master')
@section('title', 'Cập nhật Category')
@section('titleContent', 'Cập nhật Category')
@section('content')
    <form action="{{ route('statuses.update', $status->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{$status->name?$status->name:old('name')}}">
            <input type="hidden" class="form-control" name="id" id="" value="{{$status->id}}">
            @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
