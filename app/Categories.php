<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Categories extends Model
{
    use Notifiable;

    protected $table='category';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'category'
    ];

    public function product()
    {
        return $this->hasOne('App\Products');
    }
}
