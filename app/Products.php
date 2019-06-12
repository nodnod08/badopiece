<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscribes extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'product_photo', 'product_name', 'product_code', 'product_price', 'product_price_previous', 'product_size', 'product_category', 'product_desc', 'product_date'
    ];
}
