<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'kho',
        'image',
        'images',
        'view',
        'short_desc',
        'desc',
        'category_id',
        'size_id',
        'status'
    ];

    public function getCateName(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function getSizeName(){
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function comments (){
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }
    public function ratings (){
        return $this->hasMany(Rating::class, 'product_id', 'id');
    }
}
