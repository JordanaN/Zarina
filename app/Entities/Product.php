<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'amount', 'cost_price', 'code'];


     /**
     * Relação com a tabela de Caterers
     */
    public function catererProducts()
    {
        return $this->belongsToMany(\App\Entities\Caterer::class, 'product_sales', 'product_id', 'caterer_id');
    }

     /**
     * Relação com a tabela de Packaging
     */
    public function packagingProducts()
    {
    	return $this->belongsToMany(\App\Entities\Packaging::class, 'product_sales', 'product_id','packaging_id');
    }
}


	