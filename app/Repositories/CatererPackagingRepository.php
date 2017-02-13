<?php 

namespace App\Repositories;

use App\Entities\CatererPackaging;
use App\Repositories\Eloquent\BaseRepository;


class CatererPackagingRepository extends BaseRepository
{
	
	public function __construct(CatererPackaging $model)
	{
		$this->model = $model;
	}

	/**
	 * Método abstrato retorna o caminho da model de produto
	 */
	function model()
    {
        return 'App\Entities\CatererPackaging';
    }

    /**
     * método cria uma relação entre fornecedor e a embalagem;
     */
    public function createCaterersAndPackagind($packaging, $caterers)
    {
    	$data = [];
    	$data['caterer_id'] = $caterers->id;
    	$data['packaging_id'] = $packaging->id;
    	return $this->model->create($data);
    }

}
