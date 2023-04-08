<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 'product_id', 'content', 'status', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->hasOne(Customer::class, 'id','customer_id');
    }

}
