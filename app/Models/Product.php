<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\AncientScope;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'sale_price', 'image', 'content', 'category_id', 'status'];
}
