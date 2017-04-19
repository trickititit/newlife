<?php

namespace App\Repositories;

use App\AdmMenu;
use Gate;

class AdmMenusRepository extends Repository {
	
	
	public function __construct(AdmMenu $menu) {
		$this->model = $menu;
	}
	
}

?>