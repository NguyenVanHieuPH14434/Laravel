<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

   protected $fillable = [
        'name_customer',
        'address',
        'code_order',
        'email',
        'phone',
        'note',
        'user_id',
        'status_id',
        'totalPrice'

    ];

    public function orderDetails (){
        return $this->hasMany(Order_detail::class, 'order_id', 'id');
    }
    public function user (){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function status (){
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
