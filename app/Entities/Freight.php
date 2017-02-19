<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Freight extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'price'];
}
