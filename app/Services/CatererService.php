<?php 

namespace App\Services;

use App\Repositories\CatererRepository;
use App\Entities\Packaging;


class CatererService 
{
	/**
	 * @var App\Repositories\PackagingRepository
	 */
	protected $repository;

	/**
	 * Método construtor 
	 */	
	public function __construct(CatererRepository $repository, Packaging $model)
	{
		$this->repository = $repository;
		$this->model = $model;
	}

	/**
	 * Metodo busca todos os fornecedores cadastrados no banco
	 */
	public function findAllPaginate()
	{
		return $this->repository->findAllPaginate();
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

	/**
	 * Metodo faz a atualização dos dados do fornecedor
	 * @param  [Array] $[data] [array com novos dados]
	 * @param  [Integer] $[id] [id do fornecedor a ser atualizado]
	 * @returm	Boolean
	 */
	public function updateCaterers($data, $id)
	{
		$caterer =  $this->findCatererById($id);

		if (!$caterer) {
			return null;
		}

		$caterer->name = $data['name'];
		$caterer->phone = $data['phone'];
		$caterer->address = $data['address'];
		$caterer->number = $data['number'];
		$caterer->district = $data['district'];
		$caterer->city = $data['city'];
		$caterer->state = $data['state'];

		if ($caterer->save()) {
			return true;
		}

		return false;
	}

	public function findAllCaterers()
	{
		return $this->repository->findAll();
	}

	/**
	 * Metodo retorna name e o ID do fornencedor
	 */
	public function catererFindName()
	{
		$caterersList = $this->findAllCaterers()->toArray();

		$caterers = [];
        foreach ($caterersList as $key => $value) {
            $caterers[$value['id']] = $value['name'];            
        }

        return $caterers;
	}


	/**
	 * Método retorna a relação do Fornecedor com a Embalagem
	 * @param Collection $packagings 
	 * @return Array 
	 */
	public function bindPackagingAndCaterer($packagings)
	{		
		if (count($packagings) <=1) {
			return $packagings->caterers()->get()->toArray();
		}

		$catererPackaging = [];

		foreach ($packagings as $key => $packaging) {
			$catererPackaging [] = $packaging->caterers()->get()->toArray();

		}
		$response = $this->preparArrayByView($catererPackaging);

		return $response;
	}

	public function preparArrayByView($array)
	{
		$response = [];
		foreach ($array as $key => $packaging) {
			foreach ($packaging as $value) {
				$response[] = $value;
			}
		}

		return $response;
	}

}