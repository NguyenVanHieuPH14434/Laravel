<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ProductCreate;
use App\Http\Requests\ProductUpdate;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'image', 'category_id', 'size_id','images', 'status')->with('getCateName')->paginate(5);
        $images = Product::select('images')->get();
        // $arr = array('"','[','{','}',']');
        // $list = explode('images,:,",{,[', $images);
        // $list1 = explode('', $list);
        // $newImages = explode('|', $list[19]);
        // dd($list);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::all();
        $cates = Category::all();
        return view('admin.product.create', compact('sizes', 'cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        $product = new Product();
        $product->fill($request->all());
        if($request->hasFile('image')){
            $image = $request->image;
            $imgName = $image->hashName();
            $imgName = $request->id.'_'.$imgName;
            $product->image = $image->storeAs('images/products', $imgName);
        }else{
            $product->image = "";
        }

        $images = array();

        if($files=$request->file('images')){
            foreach($files as $file){
                $imgName = $file->hashName();
                $imgName = $request->id.'_'. $imgName;
                $product->images = $file->storeAs('images/products', $imgName);
                $images[]=$imgName;
            }
            $product->images = implode("|", $images);
        // dd($images);
         }

        $product->save();
        return redirect()->route('products.index')->with(['message'=>"Create Product Success!"]);
    }

    public function changeStatus(Request $request, $id){

        $product = Product::select('status')->where('id', $id)->first();

        if($product->status == 1){
            $status = 0;
        }else{
        $status = 1;
        }

        $product->where('id', $id)->update(['status'=>$status]);
        return redirect()->back();
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
        $product = Product::find($id);
        $sizes = Size::all();
        $cates = Category::all();
        $images = $product->images;
        $newImages = explode('|', $images);

        return view('admin.product.edit', compact('sizes', 'cates', 'product','newImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $data = $request->all();
        if($request->hasFile('image')){
            if(Storage::exists($product->image)){
                Storage::delete($product->image);
            }
            $image = $request->image;
            $imgName = $image->hashName();
            $imgName = $request->id .'_'.$imgName;
            $data['image'] = $image->storeAs('images/products', $imgName);
        }else{
            $request->image = $request->image;
        }

        $images = array();

        if($files=$request->file('images')){
            foreach($files as $file){
                $imgName = $file->hashName();
                $imgName = $request->id.'_'. $imgName;
                $data['images'] = $file->storeAs('images/products', $imgName);
                $images[]=$imgName;
            }
            // dd($images);
            $data['images'] = implode("|", $images);
        }

        $product->update($data);
        return redirect()->route('products.index')->with(['message'=>"Update Product Success!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(Storage::exists($product->image)){
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with(['message'=>"Delete Product Success!"]);
    }
}
