<?php
/**
 * Created by PhpStorm.
 * User: Трик
 * Date: 10.08.2017
 * Time: 22:14
 */

namespace App\Repositories;
use App\Aobject;


class AobjectsRepository extends Repository
{

    public function __construct(Aobject $object) {
        $this->model = $object;
    }
}