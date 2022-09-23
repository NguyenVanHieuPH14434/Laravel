@extends('layouts.admin.master')
@section('title', 'Tạo mới User')
@section('titleContent', 'Tạo mới User')
@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $item)
                <li class="text-danger">{{$item}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="">
            @error('name')
                <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Email</label>
            <input type="email" class="form-control" name="email" id="">
            @error('email')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div>
            <label for="name">Password</label>
            <input type="password" class="form-control" name="password" id="">
            @error('password')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div>
            <label for="name">Phone</label>
            <input type="text" class="form-control" name="phone" id="">
            @error('phone')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div>
            <label for="name">Avatar</label>
            <input type="file" class="form-control" name="avatar" id="">
            @error('avatar')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-3">
            <label for="name">Role_id</label>
           <select name="role_id" class="form-control" id="">
            @foreach ($roles as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
           </select>
        </div>

        {{-- <div class="mb-3">
            <label for="name">Status</label>
            <input type="radio" name="status" id="status1" value="1">
            <input type="radio" name="status" id="status1" value="0">Ac
            @error('avatar')
            <p>{{ $message }}</p>
        @enderror
        </div> --}}
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
