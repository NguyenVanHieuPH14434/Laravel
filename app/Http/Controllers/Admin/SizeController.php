<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSizeRequest;
use App\Http\Requests\SizeCreate;
use App\Http\Requests\SizeUpdate;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::paginate(2);
        return view('admin.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSizeRequest $request)
    {

        // $request->validate([
        //     'name'=>'required'
        // ]);

        $size = new Size();
        $size->fill($request->all());
        $size->save();
        return redirect()->route('sizes.index')->with(['message'=>"Create Size Success!"]);
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
        $size = Size::find($id);
        return view('admin.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSizeRequest $request, $id)
    {
        $size = Size::find($id);
        $data = $request->all();
        $size->update($data);
        return redirect()->route('sizes.index')->with(['message'=>"Update Size Success!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $products = Product::where('size_id', $id)->get();
        foreach($products as $item){
            Product::destroy($item->id);
        }
        Size::destroy($id);
        return redirect()->route('sizes.index')->with(['message'=>"Delete Size Success!"]);
    }
}
