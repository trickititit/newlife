<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ObjectsRepository;
use Gate;

class IndexController extends AdminController {

    public $o_rep;

    public function __construct(ObjectsRepository $o_rep) {
        parent::__construct(new \App\Repositories\AdmMenusRepository(new \App\AdmMenu));

//        if(Gate::denies('VIEW_ADMIN')) {
//            abort(403);
//        }
        $this->template = config('settings.theme').'.admin.index';
        $this->o_rep = $o_rep;
    }

    public function index($type = 'default') {
        $this->checkUser();
        switch ($type) {
            case "my": $objects = $this->o_rep->get('*', false, false, ['created_id', $this->user->id]);
            break;
            case "default": $objects = $this->o_rep->get();
            break;
            default: abort(404);
            break;
        }
        foreach ($objects as $object) {
            $object->client = json_decode($object->client);
        }
        $this->content = view(config('settings.theme').'.admin.objects')->with('objects', $objects)->render();
        $this->title = 'Панель администратора';

        return $this->renderOutput();
    }
}
