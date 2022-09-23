@extends('layouts.admin.master')
@section('title', 'Quản lý người dùng')
@section('titleContent', 'Quản lý người dùng')
@section('content')


    <table class="table">
        <div class="mb-3">
            <a href="{{ route('users.create') }}" class="btn btn-success">Tạo mới</a>
        </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Avatar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($users as $item)
           <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>
                    @if ($item->role_id == 1)
                        <a href="{{route('users.changeRole', $item->id)}}" class="btn btn-primary">Admin</a>
                        @else
                        <a href="{{route('users.changeRole', $item->id)}}" class="btn btn-danger">User</a>
                    @endif
                </td>
                <td><img src="{{asset($item->avatar)}}" width="80px" alt=""></td>
                <td>
                        <a href="{{ route('users.edit',$item->id ) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                </td>
        </tr>
           @endforeach
        </tbody>
    </table>
    {{ $users->links() }}

    <script>
        @if (session('message'))
        Swal.fire({
           position: 'top-end',
           icon: 'success',
           title: '{{session('message')}}',
           showConfirmButton: false,
           timer: 1500
           })
       @endif
   </script>
@endsection
