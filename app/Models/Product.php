<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'sale_price',
        'category_id',
        'description',
        'status',
    ];
//    public $timestamps = false; //loại bỏ 2 cột created_at và updated_at

    // phương thức join tới bảng category
    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}
