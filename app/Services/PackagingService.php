<?php 

namespace App\Services;

use App\Repositories\PackagingRepository;


class PackagingService 
{
	/**
	 * @var App\Repositories\PackagingRepository
	 */
	protected $repository;

	/**
	 * Método construtor 
	 */	
	public function __construct(PackagingRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Metodo solicita para o banco todas as model de packagings e retorna paginada
	 * @return \LengthAwarePaginator
	 */
	public function findAllPackagings()
	{
		$response = $this->repository->allPackagings();
		
		if (!$response) {
			return null;
		}

		return $response;
	}
}