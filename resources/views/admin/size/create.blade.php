@extends('layouts.admin.master')
@section('title', 'Tạo mới Size')
@section('titleContent', 'Tạo mới Size')
@section('content')
    <form action="{{ route('sizes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" value="{{old('name')}}" class="form-control" name="name" id="">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
