@extends('layouts.admin.master')
@section('title', 'Cập nhật Sản phẩm')
@section('titleContent', 'Cập nhật Sản phẩm')
@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{$product->name}}">
            @error('name')
                <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Price</label>
            <input type="text" class="form-control" name="price" id="" value="{{$product->price}}">
            @error('price')
                <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Số lượng nhập kho</label>
            <input type="text" class="form-control" name="kho" id="" value="{{$product->kho}}">
            @error('kho')
                <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Short Desc</label>
            <textarea name="short_desc" class="form-control summernote" id="" cols="30" rows="10">{!! $product->short_desc !!}</textarea>
            @error('short_desc')
                <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Description</label>
            <textarea name="desc" class="form-control summernote" id="" cols="30" rows="10">{!! $product->desc !!}</textarea>
            @error('desc')
                <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="name">Image</label>
            <input type="file" class="form-control" name="image" id="">
            <img src="{{asset($product->image)}}" width="100px" alt="">
        </div>
        <div>
            <label for="name">Images</label>
            <input type="file" class="form-control" name="images[]" multiple id="">
            @foreach ($newImages as $images)
            <img src="{{asset('images/products/'.$images)}}" width="100px" alt="">
            @endforeach
        </div>
        <div class="mb-3">
            <label for="name">Category</label>
           <select name="category_id" class="form-control" id="" >
            @foreach ($cates as $cate)
            @if ($product->category_id == $cate->id)
            <option selected value="{{$cate->id}}">{{$cate->name}}</option>
            @else
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endif
            @endforeach
           </select>
        </div>
        <div class="mb-3">
            <label for="name">Size</label>
           <select name="size_id" class="form-control" id="">
            @foreach ($sizes as $item)
            @if ($product->size_id == $item->id)
            <option selected value="{{$item->id}}">{{$item->name}}</option>
            @else
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
            @endforeach
           </select>
        </div>
        <div class="mb-3">
            <label for="name">Status</label>
            <input type="radio" {{($product->status == 1)?"checked":''}} name="status" id="status" value="1">Active
            <input type="radio" {{($product->status == 0)?"checked":''}} name="status" id="status" value="0">In-Active
            @error('status')
            <p class="text-danger mt-lg-2">{{$message}}</p>
            @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>

@endsection
