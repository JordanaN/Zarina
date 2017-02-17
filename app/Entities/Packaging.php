<?php

namespace App\Entities;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    use PresentableTrait;

    protected $presenter = 'App\Presenters\PackagingPresenter';
   

    protected $fillable = ['amount', 'price'];

    public function caterers()
    {
    	return $this->belongsToMany(\App\Entities\Caterer::class, 'caterer_packagings', 'packaging_id', 'caterer_id');
    }

    
}
