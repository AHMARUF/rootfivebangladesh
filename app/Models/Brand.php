<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'sub_cat_id',
        'status',
    ];

    public function subcategory()
    {
      return $this->belongsTo(Subcategory::class, 'sub_cat_id');
    }
}
