<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    protected $table='statuses';
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
        return $this->hasOne('App\Transactions', 'transaction_status_id');
    }
}
