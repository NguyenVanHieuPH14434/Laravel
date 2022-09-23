<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreate;
use App\Http\Requests\CategoryUpdate;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::paginate(5);
        return view('admin.category.index', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $cate = new Category();
        $cate->fill($request->all());
        if($request->hasFile('image')){
            $img = $request->image;
            $imgName = $img->hashName();
            $imgName = $request->id .'_'.$imgName;
            $cate->image = $img->storeAs('images/categories', $imgName);
        }
        $cate->save();
        return redirect()->route('categories.index')->with(['message' => "Create Category Success!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Category::find($id);
        return view('admin.category.edit', compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $cate = Category::find($id);
        $data = $request->all();
        // dd($request->image);
        if($request->hasFile('image')){
            $img = $request->image;
            $imgName = $img->hashName();
            $imgName = $request->id .'_'.$imgName;
            $data['image'] = $request->image->storeAs('images/categories', $imgName);
        }else{
            $cate->image = $cate->image;
        }
        $cate->update($data);
        return redirect()->route('categories.index')->with(['message' => "Update Category Success!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::where('category_id', $id)->get();
        foreach($products as $item){
            Product::destroy($item->id);
        }
        Category::destroy($id);
        return redirect()->route('categories.index')->with(['message' => "Delete Category Success!"]);
    }
}
