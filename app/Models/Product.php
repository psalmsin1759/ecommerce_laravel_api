<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\ProductVariant;
use \App\Models\ProductImage;
use \App\Models\RelatedProduct;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        'name',
        'sku',
        'quantity',
        'in_stock',
        'description',
        'price',
        'discounted_price',
        'sort_order',
        'cost_price',
        'alert_quantity',
        'status',
        'featured',
        'new_arrival'
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function relatedproducts()
    {
        return $this->hasMany(RelatedProduct::class);
    }
}
