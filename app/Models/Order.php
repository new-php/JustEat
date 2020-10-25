<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use CrudTrait;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address_id',
        'restaurant_id',
        'details',
        'shipping',
        'total',
        'status',
        'rider_id',
        'delivery_mode',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
/*    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    protected $table = 'orders';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
}

