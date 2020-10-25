<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    protected $table = 'order_items';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}