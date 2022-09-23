@extends('layouts.admin.master')
@section('title', 'Cập nhật User')
@section('titleContent', 'Cập nhật User')
@section('content')

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
            <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
            @error('name')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div>
            <label for="name">Email</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
            @error('email')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div>
            <label for="name">Password</label>
            <input type="password" readonly class="form-control" name="password" value="{{$user->password}}">
            @error('password')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div>
            <label for="name">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
            @error('phone')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div>
            <label for="name">Avatar</label>
            <input type="file" class="form-control" name="avatar" id="">
            <img src="{{asset($user->avatar)}}" width="100px" alt="">

        </div>
        <div class="mb-3">
            <label for="name">Role_id</label>
           <select name="role_id" class="form-control" id="">
            @foreach ($roles as $item)
                @if ($item->id == $user->role_id)
                <option selected value="{{$item->id}}">{{$item->name}}</option>
                @else
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endif
            @endforeach
           </select>
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
