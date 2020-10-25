<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address_name',
        'address_line_1',
        'address_line_2',
        'observations',
        'city',
        'postal_code',
    ];

    protected $table = 'addresses';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }

    public function orders() 
    {
        return $this->hasMany('App\Models\Order');
    }
}
