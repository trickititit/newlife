<?php

namespace App\Repositories;

use App\Object;

use Gate;

class ObjectsRepository extends Repository {

    public function __construct(Object $object) {
        $this->model = $object;
    }
}

?>