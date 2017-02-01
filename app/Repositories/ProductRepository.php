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

	/**
	 * Método abstrato retorna o caminho da model de produto
	 */
	function model()
    {
        return 'App\Entities\Product';
    }

    /**
     * metóodo retorna todos os produtos
     */
	public function all()
	{
		return $this->product->all();
	}

	/**
	 * método salva novo produto no banco
	 * @param array $data
	 * @return model Product
	 */
	public function saveNewProduct($data) 
	{
		return $this->product->create($data);
	}

	/**
	 * método busca o produto pelo id
	 * @param integer $id
	 * @return model $product
	 */
	public function findProductById($id)
	{
		return $this->product->find($id);		
	}

	
}