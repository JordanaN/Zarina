<?php 

namespace App\Services;

use App\Repositories\PackagingRepository;
use App\Repositories\CatererPackagingRepository;
use App\Services\CatererService;


class PackagingService 
{

	/**
	 * @var  App\Repositories\CatererPackagingRepository
	 */
	private $catererPackagingRepository;
   
	/**
	 * @var App\Repositories\PackagingRepository
	 */
	private $repository;

	/**
	 * @var App\Services\CatererService
	 */
	private $catererService;

	/**
	 * Método construtor 
	 */	
	public function __construct(
		PackagingRepository $repository,
		CatererService $catererService,
		CatererPackagingRepository $catererPackagingRepository
	){
		$this->repository = $repository;
		$this->catererService = $catererService;
		$this->catererPackagingRepository = $catererPackagingRepository;
	}

	/**
	 * Metodo solicita para o banco todas as model de packagings e retorna paginada
	 * @return \LengthAwarePaginator
	 */
	public function findAllPackagingsPaginate()
	{
		$response = $this->repository->allPackagingsPaginate();
		
		if (!$response) {
			return null;
		}

		return $response;
	}


	public function createNewPackaging($data)
	{
		if(empty($data)) {
			return null;
		}

		$packaging = $this->repository->createPackaging($data);

		$this->bindCatererAndPackaging($data['caterers'], $packaging);

		if (!$packaging) {
			return null;
		}

		return true;
	}

	/**
	 * Método salva a relação de fornecedor e embalagem
	 * @param Model $packaging
	 * @param Model $caterers
	 * @return Boolean 
	 */

	public function bindCatererAndPackaging($catererId, $packaging)
	{
		$caterers = $this->catererService->findCatererById($catererId);	

		if (empty($caterers->packagings()->find($packaging->id))) {
			$this->catererPackagingRepository->createCaterersAndPackagind($packaging, $caterers);
		}
	}

	/**
	 * Método busca cadastro embalagem pelo ID
	 * @param Integer $id 
	 * @return App\Entities\Packaging
	 */
	public function findPackagingById($id)
	{
		if (!$id) {
			return null;
		}
		 return $this->repository->findById($id);
	}

	/**
	 * Método retorna todas as embalagens cadastradas
	 */
	public function findAllPackagings()
	{
		return $this->repository->allPackagings();
	}
}

