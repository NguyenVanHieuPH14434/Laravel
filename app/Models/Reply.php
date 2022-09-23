<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply',
        'product_id',
        'comment_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function product(){
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
