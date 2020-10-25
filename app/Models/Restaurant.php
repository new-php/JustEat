<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use CrudTrait;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'photo',
        'phone',
        'address',
        'postal_code',
        'city',
        'state',
        'country',
    ];

    protected $table = 'restaurants';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}