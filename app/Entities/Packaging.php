<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['provider', 'amount', 'price'];
}

