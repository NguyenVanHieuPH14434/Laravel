<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;
// use Illuminate\Support\Facades\Session;
use Session;

// use Session;

class CartController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addToCart($id)
    {
        $product = Product::find($id);
        dd($product);
        $cart = session()->get('cart');

        $cart[$id] = [
            'name'=>$product->name,
            'price'=>$product->price,
            'image'=>$product->image,
            'quantity'=>1,
        ];

        session()->put('cart', $cart);
        return redirect()->route('cart')->with(['message'=>"Add to Cart Success!"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req, $id, $quanty)
    {
        $product = Product::find($id);
        if($product != null){
            $oldCart = Session('cart')?Session('cart'):null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id, $quanty);
            $req->session()->put('cart', $newCart);
            // dd($newCart);
        }
        // return redirect()->route('cart');
        return redirect()->back()->with(['message'=>"Add to Cart Success!"]);
    }
    public function add(Request $req, $id)
    {
        // dd(intval($req->quanty), $req->quanty);
        $product = Product::find($id);
        if($product != null){
           if($req->quanty > $product->kho){
                return redirect()->back()->with(['error'=>'Số lượng phải nhỏ hơn '.$product->kho.'']);
           }else{
            $oldCart = Session('cart')?Session('cart'):null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id, intval($req->quanty - 1));
            $req->session()->put('cart', $newCart);
           }
            // dd($newCart);
        }
        // return redirect()->route('cart');
        return redirect()->back()->with(['message'=>"Add to Cart Success!"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->data);
        foreach($request->data as $item){
            $product = Product::select('kho')->where('id', $item['key'])->first();
           if($item['value'] > $product->kho){
                return response()->json(['status'=>$product]);
           }else{
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->updateCart($item['key'], $item['value']);
            $request->session()->put('cart', $newCart);
           }
        }
        // return response()->with(['message'=>'Update Cart Success!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteProductCart($id);
        if(Count($newCart->products)>0){
            $req->session()->put('cart', $newCart);
        }else{
            $req->session()->forget('cart');
        }
        return redirect()->back();
    }
}
