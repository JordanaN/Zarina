<?php 

namespace App\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use App\Entities\Freight;


class FreightRepository extends BaseRepository
{
	public function __construct(Freight $freight)
	{
		$this->freight = $freight;
	}

	/**
	 * Método abstrato retorna o caminho da model de produto
	 */
	function model()
    {
        return 'App\Entities\Freight';
    }

    /**
     * Método retorna fretes paginados
     */    
    public function paginateFreightAll()
    {
    	return $this->freight->paginate();
    }

    /**
     * Método salva no banco novo cadastro de frete
     * @param Array $data 
     * @return  Boolean
     */
    public function createFreight($data)
    {
    	return $this->freight->create($data);
    }

    /**
     * Método busca no banco frete pelo ID
     * @param Integer $id
     * @return  Model Freight
     */
    public function findById($id)
    {
        return $this->freight->find($id);
    }

    /**
     * método retorna todos os freste sem paginação
     */
    public function freightsAll()
    {
        return $this->freight->all();
    }


}
