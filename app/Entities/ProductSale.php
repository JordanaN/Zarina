<?php

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $fillable = ['id_product', 'id_packaging', 'id_freight'];

    
}
