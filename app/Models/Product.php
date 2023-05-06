<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'sale_price', 'image', 'content', 'category_id', 'status'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
