<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Caterer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone', 'address', 'number', 'district', 'city', 'state'];

    /**
     * Relação com a tabela de Packaging
     */
    public function packagings()
    {
        return $this->belongsToMany(\App\Entities\Packaging::class, 'caterer_packagings', 'caterer_id', 'packaging_id');
    }


    /**
     * Relação com a tabela de Produtos
     */
    public function productCaterers()
    {
        return $this->belongsToMany(\App\Entities\Product::class, 'product_sales', 'caterer_id', 'product_id');
    }


}
