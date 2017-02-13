<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CatererPackaging extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['caterer_id', 'packaging_id'];


}
