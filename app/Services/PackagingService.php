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
	protected $catererPackagingRepository;
   
	/**
	 * @var App\Repositories\PackagingRepository
	 */
	protected $repository;

	/**
	 * @var App\Services\CatererService
	 */
	protected $catererService;

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
	public function findAllPackagings()
	{
		$response = $this->repository->allPackagings();
		
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

		$caterers = $this->catererService->findCatererById($data['caterers']);

		$packaging = $this->repository->createPackaging($data);

		$this->bindCatererAndPackaging($caterers, $packaging);

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

	public function bindCatererAndPackaging($caterers, $packaging)
	{
		if ($packaging->caterers()->get()->isEmpty()) {
			$this->catererPackagingRepository->createCaterersAndPackagind($packaging, $caterers);
			return true;
		}
		return null;
	}


}

