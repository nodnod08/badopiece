<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table='transactions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'transaction_type_id', 'transaction_status_id', 'payment_status_id', 'amount', 'customer_id', 'shipping_amount', 'process_authorization_code', 'payment_type'
    ];

    public function items()
    {
        return $this->hasMany('App\Items', 'transaction_id');
    }

    public function shipping()
    {
        return $this->hasOne('App\Shipping_details', 'transaction_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id');
    }
}
