<?php 

namespace App\Services;

use App\Repositories\CatererRepository;


class CatererService 
{
	/**
	 * @var App\Repositories\PackagingRepository
	 */
	protected $repository;

	/**
	 * Método construtor 
	 */	
	public function __construct(CatererRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Metodo busca todos os fornecedores cadastrados no banco
	 */
	public function findAllCaterers()
	{
		return $this->repository->findAll();
	}


	/**
	 * Método salva novo fornecedor no banco
	 */
	public function createNewCaterer($data)
	{
		if (!$data) {
			return null;
		}

		$response = $this->repository->createCaterer($data);

		if(!$response){
			return null;
		}

		return $response;
	}

	/**
	 * Metodo busca fornecedor pelo Id
	 * @param $[id] [id do fornecedor]
	 */
	public function findCatererById($id)
	{
		if (!$id) {
			return null;
		}

		return $this->repository->findById($id);
	}

}