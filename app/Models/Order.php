<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use CrudTrait, HasFactory;

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
        'order_status',
        'status',
        'rider_id',
        'delivery_mode',
        'delivery_time',
        'payed',
    ];

    protected $table = 'orders';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function rider()
    {
        return $this->belongsTo('App\Models\User', 'rider_id');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
}

