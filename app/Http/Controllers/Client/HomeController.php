<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::limit(3)->get();
        $cate_id1 = Category::where('id', 1)->first();
        $cate_id2 = Category::where('id', 2)->first();
        $cate_id3 = Category::where('id', 3)->first();
        $products = Product::select('id', 'name', 'image', 'price')->where('status',1)->orderBy('id', 'desc')->limit(12)->get();
        $product_views = Product::select('id', 'name', 'image', 'price', 'view')->orderBy('view', 'desc')->get();
        // return view('client.index',compact('product_views'));
        $products_img = Product::select('image')->where('status',1)->limit(6)->get();
        // $product = Product::select('id', 'name', 'image', 'price')->where('status',1)->limit(1)->get();
            // return view('client.index');
            return view('client.index', compact('products', 'cates', 'cate_id1', 'cate_id2', 'cate_id3', 'products_img', 'product_views'));
    }


    public function contact(){
        return view('client.contact');
    }
    public function shop(){
        $cates = Category::all();
        $sizes = Size::all();
        // $products = Product::select('id', 'name', 'image', 'price', 'images')->limit(5)->get();
        $products = Product::select('id', 'name', 'image', 'price', 'images')->paginate(5);
        return view('client.shop', compact('products', 'cates', 'sizes'));
    }

    public function pro_cate($id){
        $cates = Category::all();
        $sizes = Size::all();
        $products = Product::select('id', 'name', 'image', 'price', 'images')->where('category_id', $id)->paginate(5);
        return view('client.shop', compact('products', 'cates', 'sizes'));
    }
    public function pro_size($id){
        $cates = Category::all();
        $sizes = Size::all();
        $products = Product::select('id', 'name', 'image', 'price', 'images')->where('size_id', $id)->paginate(5);
        return view('client.shop', compact('products', 'cates', 'sizes'));
    }
    public function shoppingCart(){
        return view('client.shopping-cart');
    }
    public function checkout(){
        return view('client.checkout');
    }
    public function checkout1(Request $request){


$as = session()->get('cart');
// $a = session()->get('cart');

        $order = new Order();
        $order->fill($request->all());

        $order->user_id = Auth::user()->id;
        $order->status_id = 1;
        // $order->orderStatus_id = '1';
        $order->code_order = rand(0,999999999);
        $order->save();
        // dd(session()->get('cart')->products['quanty']);

        foreach(session()->get('cart')->products as $item){
            $order_details = new Order_detail();
            $order_details->product_id = $item['productInfor']->id;
            $order_details->order_id = $order->id;
            $order_details->totalPrice = $item['price'];
            $order_details->quantity = $item['quanty'];
            $order_details->save();
            // dd($item['productInfor']);
            $updateSl = Product::where('id', $item['productInfor']->id)->first();
            $updateSl->kho = $updateSl->kho - $item['quanty'];
            $updateSl->update();

            };

            // $a = $order_details;
            Mail::send('mail.sendEmail', compact('order', 'as'), function($email) use ($order){
                $email->subject('Shop nội thất');
                $email->to($order->email, $order->name_customer);
            });

        Session::forget('cart');


        return view('client.bill', [
            'order'=>$order,
            'as'=>$as
        ]);
    }
    public function shopDetail($id){
        $product = Product::find($id);
        $product->increment('view', 1);
        $products = Product::select('id', 'name', 'image', 'price', 'images')->limit(4)->get();
        $products_cate = Product::select('id', 'name', 'image', 'price', 'images')->where('category_id', $product->category_id)->get();
        return view('client.shop-details', compact('product', 'products','products_cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
