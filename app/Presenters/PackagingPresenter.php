<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use App\Entities\Packaging;
use App\Entities\Caterer;

class PackagingPresenter extends Presenter 
{
	public function caterersPackaging()
	{
		$caterers = Caterer::all();	

		// $packaging = [];	

		// foreach ($caterers as $key => $value) {
		// 	$packaging[] =	Packaging::nameCaterer($value['id']);
		// }

		// dd($packaging);
	}

    

}
