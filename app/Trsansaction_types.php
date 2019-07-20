<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_types extends Model
{
    protected $table='transaction_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_type'
    ];

    public function transaction()
    {
        return $this->hasOne('App\Transactions', 'transaction_type_id');
    }
}
