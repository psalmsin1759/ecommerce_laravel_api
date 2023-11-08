<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'state',
        'country',
        'geocode_latitude',
        'geocode_longitude',
        'email',
        'phone',
        'opening_times',
        'aboutus',
        'mission',
        'vision',
        'terms',
        'privacy_policy',
        'return_policy',
        'refund_policy',
        'favicon_path',
        'logo_path',
        'footer_logo_path',
        'meta_title',
        'meta_description',
        'meta_tag_keywords',
        'instagram_link',
        'facebook_link',
        'twitter_link',
        'tiktok_link',
        'payment_pub_key',
        'payment_secret_key',
    ];
}
