<?php

namespace App\Repositories;

use App\Comfort;
use DB;
use Gate;

class ComfortsRepository extends Repository {

    public function __construct(Comfort $comfort) {
        $this->model = $comfort;
    }

    public function getComfortsId($comforts_title) {
        if (!empty($comforts_title)) {
            $query = $this->model->select("id");
            $query->whereIn("title", $comforts_title);
            $comforts = $query->get();
            $comforts_id = array();
            foreach ($comforts as $comfort) {
                $comforts_id[] = $comfort->id;
            }
            return $comforts_id;
        } else {
            return false;
        }
    }
}

?>