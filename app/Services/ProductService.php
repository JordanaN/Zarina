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
		return $this->repository->allProducts();
	}

	public function newProduct($data)
	{
		if (!$data) {
			return null;
		}

		
		return $this->repository->saveNewProduct($data);
	}

	/**
	 * @param integer $id
	 * @return model $product
	 */
	public function findById($id)
	{
		if (!$id) {
			return null;
		}

		$response = $this->repository->findProductById($id);

		return $response;
	}

	/**
	 * Produto realiza a atualização dos dados do produto
	 * @var array $data
	 * @var integer $id
	 * @return boolean
	 */
	public function updateProduct($data, $id)
	{
		if (!$id) {
			return null;
		}

		$product = $this->findById($id);

		
		$product->description = $data['description'];
		$product->amount = $data['amount'];
		$product->cost_price = $data['cost_price'];
		$product->code = $data['code'];


		if ($product->save()) {
			return true;
		}

		return false;

	}

		
}


