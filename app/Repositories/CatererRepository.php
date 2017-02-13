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
    public function findAllPaginate()
    {
    	return $this->caterer->paginate();
    }

    /**
     * Metodo cria um novo fornecedor no banco
     * @param Array $data dados para a criação do novo fornecedor
     */

    public function createCaterer($data)
    {
    	return $this->caterer->create($data);
    }

    /**
     * Método busca fornecedor pelo ID
     * @param Integer $id da entidade a ser pesquisada
     * @return Model fornecedor
     */
    public function findById($id)
    {
    	return $this->caterer->find($id);
    }

    /**
     * Método retorna todos fornecedores do sistema
     */
    public function findAll()
    {
        return $this->caterer->All();
    }

}