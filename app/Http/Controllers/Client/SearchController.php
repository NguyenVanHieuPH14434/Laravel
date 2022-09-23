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

class SearchController extends Controller
{
    public function index()
    {
        $product_views = Product::select('id', 'name', 'image', 'price', 'view')->orderBy('view', 'desc')->get();
        return view('client.index',compact('product_views'));
    }

    public function listOrder(Request $request, $id){
        // dd($id);
        $listOrders = Order::where('user_id', $id)->paginate(3);

        return view('client.listOrder', compact('listOrders'));
    }

    // public function shopSearch (Request $request) {
    //     // $key = URL::current();
    //     // $out = "";
    //     // dd($request->input('key'));
    //     $cates = Category::all();
    //     $sizes = Size::all();
    //     $products = Product::where('name', 'LIKE', '%'.$request->key.'%')->get();
    //     // dd($products);
    //     return view('client.shopSearch', compact('products', 'cates', 'sizes'))->render();

    // }
    public function shopSearch (Request $request) {
        // $key = URL::current();
        $out = "";
        // dd($request->input('key'));
        $cates = Category::all();
        $sizes = Size::all();
        $products = Product::where('name', 'LIKE', '%'.$request->key.'%')->get();

        foreach ($products as $item){
                       $out .= '<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="'.asset($item->image).'">
                                <img src="'.asset($item->image).'" width="306px" height="270px" />
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="'.asset('img/icon/heart.png').'" alt=""></a></li>
                                        <li><a href="#"><img src="'.asset('img/icon/compare.png').'" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="'.asset('img/icon/search.png').'" alt=""></a></li>
                                        <li><a href="'. route('pro_detail', $item->id) .'"><img src="'.asset('img/icon/search.png').'" alt=""><span>Xem chi tiết</span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>'.$item->name.'</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>'.number_format($item->price).' VNĐ</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>';
    };
        // dd($products);

        return response($out);
        // return view('client.shopSearch', compact('products', 'cates', 'sizes'))->render();
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


    public function search(Request $req){
        $out = '';
        // $products = Product::where('name', 'LIKE', '%'.$req->search.'%')->get();
        $products = Product::where('name', 'LIKE', '%'.$req->search.'%')->get();
        if($req->ajax()){
            foreach($products as $pro){
                $out .= '<div class="mb-3"><a style="text-decoration: none" href="'.route('pro_detail', $pro->id).'"><span><img src="'.$pro->image.'" width="50px"/></span>&nbsp &nbsp<span>'.$pro->name.'</span></a></div>';
            }
        }
        return response($out);
    }


    public function orderSearch(Request $req){
        // dd()
        $out = '';
        $orders = Order::where('user_id', Auth::user()->id)->where('code_order', 'LIKE', '%'.$req->key.'%')->paginate(3);
        $listOrders = Order::where('user_id', Auth::user()->id)->where('code_order', 'LIKE', '%'.$req->key.'%')->get();

        if($req->key & $req->uui){
            return view('client.listOrder1', compact('listOrders'));
        }
        if($req->ajax()){
            foreach($orders as $od){
                $out .= '<a href="'.route('listOrderDetails', $od->id).'" class="list-group-item list-group-item-action list-group-item-primary"><label for="">Mã đơn hàng:</label> '.$od->code_order.'</a>';
            }
        }
        return response($out);
    }

    public function listOrderDetails(Request $req, $id){
        $listOdDetails = Order_detail::where('order_id', $id)->get();

        $order = Order::where('id', $id)->first();
        // dd($order);
        return view('client.listOrderDetails', compact('listOdDetails', 'order'));

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
