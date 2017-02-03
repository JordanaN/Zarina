<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    
    public function productsOfSales()
    {
    	return $this->hasMany(Product_Sale::class);

    }
}
