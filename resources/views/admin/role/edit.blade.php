@extends('layouts.admin.master')
@section('title', 'Cập nhật Role')
@section('titleContent', 'Cập nhật Role')
@section('content')
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{$role->name}}">
            <input type="hidden" class="form-control" name="id" id="" value="{{$role->id}}">
            @error('name')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
