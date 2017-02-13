<?php 

namespace App\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use App\Entities\Packaging;


class PackagingRepository extends BaseRepository
{
	public function __construct(Packaging $packaging)
	{
		$this->packaging = $packaging;
	}

	/**
	 * Método abstrato retorna o caminho da model de produto
	 */
	function model()
    {
        return 'App\Entities\Packaging';
    }

    /**
     * Metodo retorna todos as embalagens paginadas
     */
    public function allPackagings()
    {
    	return $this->packaging->paginate();
    }

    /**
     * Metodo cria um novo cadastro de embalagem no banco
     * @param Array $data dados para a nova embalagem
     * @return Boolean 
     */
    public function createPackaging($data)
    {
    	return $this->packaging->create($data);
    }
	
	
}