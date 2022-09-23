@extends('layouts.admin.master')
@section('title', 'Tạo mới Sản phẩm')
@section('titleContent', 'Tạo mới Sản phẩm')
@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="">
            <input type="hidden" class="form-control" name="view" id="" value="0">
            @error('name')
                <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Price</label>
            <input type="text" class="form-control" name="price" id="">
            @error('price')
                 <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Số lượng nhập kho</label>
            <input type="text" class="form-control" name="kho" id="">
            @error('kho')
                 <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Short Desc</label>
            <textarea name="short_desc" class="form-control summernote" id="" cols="30" rows="10"></textarea>

            @error('short_desc')
                 <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Description</label>
            <textarea name="desc" class="form-control summernote" id="" cols="30" rows="10"></textarea>
            @error('desc')
                 <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Image</label>
            <input type="file" class="form-control" name="image" id="">
            @error('image')
                 <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Images</label>
            <input type="file" class="form-control" name="images[]" multiple id="">
        </div>
        <div class="mb-3">
            <label for="name">Category</label>
           <select name="category_id" class="form-control" id="">
            @foreach ($cates as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
           </select>
        </div>
        <div class="mb-3">
            <label for="name">Size</label>
           <select name="size_id" class="form-control" id="">
            @foreach ($sizes as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
           </select>
        </div>
        <div class="mb-3">
            <label for="name">Status</label>
            <input type="radio" name="status" id="status" value="1">Active
            <input type="radio" name="status" id="status" value="0">In-Active
            @error('status')
            <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
