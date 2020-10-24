<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use CrudTrait;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',
        'photo',
        'description',
        'name',
        'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
/*    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    protected $table = 'addresses';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
}
