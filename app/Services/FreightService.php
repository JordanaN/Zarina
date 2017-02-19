<?php 

namespace App\Services;

use App\Repositories\FreightRepository;



class FreightService
{

	/**
	 * @var FreightRepository
	 */
	private $repository;

	
	public function __construct(FreightRepository $repository)
	{
		$this->repository = $repository;
	}


	/**
	 * Método retorna todos os fretes paginados
	 */
	public function paginateFreight()
	{
		return $this->repository->paginateFreightAll();
	}

	/**
	 * Método cria novo frete
	 * @param  Array $data
	 * @return Boolean
	 */
	public function createNewFreight($data)
	{
		if (empty($data)) {
			return null;
		}

		return $this->repository->createFreight($data);
	}

	/**
	 * Método busca frete pelo ID
	 * @param Integer $id
	 * @return Model Freight
	 */
	public function findFreightById($id)
	{
		if (!$id) {
			return null;
		}

		return $this->repository->findById($id);

	}


	/**
	 * 	Método atualiza do frete com novos dados
	 * 	@param Array $data
	 * 	@param Integer $id do frete a ser atualizado
	 * 	@return  Boolean
	 */
	public function updateFreight($data, $id)
	{
		$freight = $this->findFreightById($id);

		if (!$freight) {
			return null;
		}

		$freight->description = $data['description'];
		$freight->price = $data['price'];

		if ($freight->save()) {
			return true;
		}
		return false;
	}
}