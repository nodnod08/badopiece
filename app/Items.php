<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table='items';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'product_id', 'product_photo', 'product_name', 'product_code', 'product_price', 'product_quantity', 'product_description'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Transactions', 'transaction_id');
    }
}
