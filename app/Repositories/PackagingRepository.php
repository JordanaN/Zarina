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

    public function allPackagings()
    {
    	return $this->packaging->paginate();
    }

    public function create()
    {
    	return $this->packaging->create($data);
    }
	
	
}