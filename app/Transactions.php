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
        'transaction_id', 'transaction_type_id', 'transaction_status_id', 'transaction_item_status_id', 'payment_status_id', 'amount', 'customer_id', 'shipping_amount', 'process_authorization_code', 'payment_type'
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

    public function item_status()
    {
        return $this->belongsTo('App\ItemStatuses', 'transaction_item_status_id');
    }

    public function transaction_type()
    {
        return $this->belongsTo('App\Transaction_types', 'transaction_type_id');
    }

    public function transaction_status()
    {
        return $this->belongsTo('App\Statuses', 'transaction_status_id');
    }

    public function payment_status()
    {
        return $this->belongsTo('App\PaymentStatuses', 'payment_status_id');
    }

    public function feedback() {
        return $this->hasMany('App\Feedback', 'transaction_id');
    }
}
