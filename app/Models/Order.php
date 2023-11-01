<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderid',
        'first_name',
        'last_name',
        'email',
        'phone',
        'payment_method',
        'total_price',
        'tax',
        'status',
        'discount',
        'currency',
        'shipping_price',
        'shipping_address',
        'shipping_postalcode',
        'shipping_city',
        'shipping_state',
        'shipping_country',
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
