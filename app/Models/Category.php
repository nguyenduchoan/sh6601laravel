<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Khai báo các trường dữ liệu
    protected $fillable = ['name', 'status'];

    // phương thức join tới bảng product lấy ra mảng Product
    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

}
