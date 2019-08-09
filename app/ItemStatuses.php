<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemStatuses extends Model
{
    protected $table='item_statuses';
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
        return $this->hasOne('App\Transactions', 'transaction_item_status_id');
    }
}
