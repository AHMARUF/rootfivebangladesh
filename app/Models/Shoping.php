<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoping extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id',
        'invoice_id',
        'product_id',
        'product_name',
        'product_code',
        'Price',
        'quantity',
        'total',
    ];

     public function Product()
    {
      return $this->belongsTo(Product::class, 'product_id');
    }
  
}
