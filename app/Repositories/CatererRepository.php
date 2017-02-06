<?php 

namespace App\Repositories;

use App\Entities\Caterer;
use App\Repositories\Eloquent\BaseRepository;


class CatererRepository extends BaseRepository
{
	
	public function __construct(Caterer $caterer)
	{
		$this->caterer = $caterer;
	}

	/**
	 * Método abstrato retorna o caminho da model de produto
	 */
	function model()
    {
        return 'App\Entities\Caterer';
    }

    /**
     * Metodo retorna os registros do banco paginados
     */
    public function findAll()
    {
    	return $this->caterer->paginate();
    }


    public function createCaterer($data)
    {
    	return $this->caterer->create($data);
    }

    public function findById($id)
    {
    	return $this->caterer->find($id);
    }

}