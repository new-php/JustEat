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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'cif',
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