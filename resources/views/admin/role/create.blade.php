@extends('layouts.admin.master')
@section('title', 'Tạo mới Role')
@section('titleContent', 'Tạo mới Role')
@section('content')
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="">
            {{-- <input type="hidden" class="form-control" name="parent_id" id="" value="0"> --}}
            @error('name')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
