<?php 

namespace App\Services;

use App\Entities\Product;
use App\Repositories\ProductRepository;

class ProductService 
{
	/**
	 * @var App\Repositories\ProductRepository
	 */
	protected $repository;
	
	
	public function __construct(ProductRepository $repository)
	{
		$this->repository = $repository;
	}

	public function findAllProducts()
	{
		return $this->repository->all();
	}

	
}