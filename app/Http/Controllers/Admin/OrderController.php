<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Status;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);
        return view('admin.order.index', compact('orders'));
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
        $statuses = Status::all();
        $order = Order::find($id);
        return view('admin.order.edit', compact('order', 'statuses'));
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
        // dd($request->all());
        $order = Order::find($id);
        $order->fill($request->all());
        $order->user_id = $order->user_id;
        $order->note = $order->note;
        $order->update();

        $as = Order_detail::where('order_id',$order->id)->get();


        $today = Carbon::today();
        $format_date = date('d-m-Y', strtotime($today));

        // if($request->status_id == 2){
        if($order->status_id == 4){
            Mail::send('mail.sendEmailUpdateOrder', compact('order', 'as', 'format_date'), function($email) use ($order){
                $email->subject('Shop nội thất');
                $email->to($order->email, $order->name_customer);
            });
        }
        if($order->status_id == 3){
            Mail::send('mail.sendEmailSuccess', compact('order', 'as', 'format_date'), function($email) use ($order){
                $email->subject('Shop nội thất');
                $email->to($order->email, $order->name_customer);
            });
        }

        return redirect()->route('orders.index')->with(['message'=>"Update Success!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderDetails = Order_detail::where('order_id', $id)->get();
        foreach($orderDetails as $item){
            Order_detail::destroy($item->id);
        }

        Order::destroy($id);
        return redirect()->back();
    }
}
