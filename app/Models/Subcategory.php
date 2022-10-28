<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_cat_name',
        'cat_id',
        'status',
    ];

    public function category()
    {
      return $this->belongsTo(Category::class, 'cat_id');
    }

   
}
