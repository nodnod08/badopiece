<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $table='feedbacks';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'product_id', 'rate', 'item_name', 'item_code', 'item_photo', 'feedback', 'name'
    ];

    public function product()
    {
        return $this->belongsTo('App\Products', 'product_id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transactions', 'transaction_id');
    }
}
