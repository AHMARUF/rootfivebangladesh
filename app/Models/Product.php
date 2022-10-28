<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_Name',
        'product_slug',
        'product_code',
        'cat_id',
        'sub_cat_id',
        'brand_id',
        'PC_builder',
        'Key_Features',
        'Specification',
        'Description',
        'latest_price',
        'quantity',
        'Price',
        'Regular_Price',
        'image',
        'status',
    ];

    public function category()
    {
      return $this->belongsTo(Category::class, 'cat_id');
    }
    public function Subcategory()
    {
      return $this->belongsTo(Subcategory::class, 'sub_cat_id');
    }
     public function brand()
    {
      return $this->belongsTo(Brand::class, 'brand_id');
    }
}
