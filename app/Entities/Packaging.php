<?php

namespace App\Entities;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    use PresentableTrait;

    protected $presenter = 'App\Presenters\PackagingPresenter';
   

    protected $fillable = ['amount', 'price'];

    protected function providers()
    {
    	return $this->belongsToMany('App\Entities\Caterer', 'caterer_packagings', 'caterer_id');
    }

    
}

