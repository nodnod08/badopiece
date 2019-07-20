<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping_details extends Model
{
    protected $table='shipping_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'firstname', 'lastname', 'phone', 'email', 'street_address', 'city', 'state', 'postal', 'country'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction', 'transaction_id');
    }
}
