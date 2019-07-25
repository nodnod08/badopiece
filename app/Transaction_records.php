<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_records extends Model
{
    protected $table='transaction_records';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id'
    ];

}
