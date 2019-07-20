<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStatuses extends Model
{
    protected $table='payment_statuses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    public function transaction()
    {
        return $this->hasOne('App\Transactions', 'payment_status_id');
    }
}
