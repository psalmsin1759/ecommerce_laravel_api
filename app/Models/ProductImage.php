<?php

namespace App\Models;

use \App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['id','product_id', 'path'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
