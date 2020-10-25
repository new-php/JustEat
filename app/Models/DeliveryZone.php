<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class DeliveryZone extends Model
{
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',
        'postal_code',
        'min_order_price',
        'delivery_price',
        'delivery_time',
    ];

    protected $table = 'delivery_zones';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];
}