<?php

namespace App\Entities;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    use PresentableTrait;

    protected $presenter = 'App\Presenters\PackagingPresenter';
   

    protected $fillable = ['name', 'amount', 'price'];

    /**
     * Relação com a tabela de Caterers
     */
    public function caterers()
    {
    	return $this->belongsToMany(\App\Entities\Caterer::class, 'caterer_packagings', 'packaging_id', 'caterer_id');
    }

    /**
     * Relação com a tabela de Produtos
     */
    public function productPackaging()
    {
    	return $this->belongsToMany(\App\Entities\Product::class, 'product_sales', 'packaging_id', 'product_id');
    }

    
}
