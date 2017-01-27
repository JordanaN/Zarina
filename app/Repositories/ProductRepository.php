<?php 

namespace App\Repositories;

use App\Services\ProductService;
use App\Entities\Product;
use App\Repositories\Eloquent\BaseRepository;



class ProductRepository extends BaseRepository
{
	
	public function __construct(Product $product)
	{
		$this->product = $product;
	}

	function model()
    {
        return 'App\Entities\Product';
    }

	public function all()
	{
		return $this->product->all();

	}


}