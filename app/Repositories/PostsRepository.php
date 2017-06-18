<?php
/**
 * Created by PhpStorm.
 * User: Трик
 * Date: 18.06.2017
 * Time: 21:14
 */

namespace App\Repositories;

use App\Post;

class PostsRepository extends Repository
{

    public function __construct(Post $post) {
        $this->model = $post;
    }

}