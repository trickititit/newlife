<?php

namespace App\Repositories;

use App\Image;

use Gate;

class ImagesRepository extends Repository {

    public function __construct(Image $image) {
        $this->model = $image;
    }

    public function getTmpImg($id) {
        
        $images = $this->model->where([['temp_object_id', "=",  $id],['temp', "=", 1]])->get();

        

        return $images;
    }
}

?>