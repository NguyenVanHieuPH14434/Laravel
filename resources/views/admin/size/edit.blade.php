@extends('layouts.admin.master')
@section('title', 'Cập nhật Size')
@section('titleContent', 'Cập nhật Size')
@section('content')
    <form action="{{ route('sizes.update', $size->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{$size->name}}">
            <input type="hidden" class="form-control" name="id" id="" value="{{$size->id}}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
