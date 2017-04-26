<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ObjectsRepository;
use App\Repositories\AdmMenusRepository;
use App\Object;
use Menu;
use Gate;

class IndexController extends AdminController {

    protected $o_rep;
    protected $m_rep;    

    public function __construct(ObjectsRepository $o_rep, AdmMenusRepository $m_rep) {
        parent::__construct(new \App\Repositories\AdmMenusRepository(new \App\AdmMenu));

//        if(Gate::denies('VIEW_ADMIN')) {
//            abort(403);
//        }
        $this->template = config('settings.theme').'.admin.index';
        $this->o_rep = $o_rep;
        $this->m_rep = $m_rep;
    }

    public function index($type = 'default') {
        $this->checkUser();
        $objects = $this->o_rep->getScope($type);
        $actions = array();
        foreach ($objects as $object) {
            $actions = array_add($actions,"object".$object->id, $this->getActions($object, $this->user, $type));
            $object->client = json_decode($object->client);
        }
        $menus = $this->getObjectsMenu();
        $this->content = view(config('settings.theme').'.admin.objects')->with(array("objects" => $objects, "menus" => $menus, "actions" => $actions))->render();
        $this->title = 'Личный кабинет';

        return $this->renderOutput();
    }
    
    private function getObjectsMenu() {

        $menu = $this->m_rep->getMenu("object");

            $mBuilder = Menu::make('objectNav', function($m) use ($menu) {

                foreach($menu as $item) {
                    if($item->parent == 0) {
                        $count = $this->o_rep->getScope($item->alias, false, true);
                        $m->add($item->title,array('url' => route($item->path, ["type" => (($item->alias == "default")? "" : $item->alias)]), 'id' => $item->id))->data(array('icon' => $item->icon,"count" => $count ));
                    }
                    else {
                        if($m->find($item->parent)) {
                            $m->find($item->parent)->add($item->title,route($item->path , ["type" => $item->alias]))->id($item->id);
                        }
                    }
                }

            });

            //dd($mBuilder);

            return $mBuilder;
    }

    private function getActions($object, $user, $type) {
        
        switch ($type) {
            case "inwork":
                $editlink = route('object.update',['object'=>$object->alias]);
                $unworklink = route('object.unwork',['object'=>$object->alias]);
                $uninwork = "<form action='$unworklink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Убрать из работы'><i class=\"fa fa-gears fa-lg cancel\"></i></button></form>";
                $deletelink = route('object.softDelete',['object'=>$object->alias]);
                $delete = "<form action='$deletelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                $edit = "<a href='$editlink' title='Редактировать'><i class=\"fa fa-edit fa-lg\"></i></a>";
                $favorites = "";
                return $edit.$uninwork.$favorites.$delete;
            case "prework":
                $who = $object->preworkingUser->name;
                $acceptlink = route('object.accessPreWork',['object'=>$object->alias]);
                $canсelllink = route('object.cancelPreWork',['object'=>$object->alias]);
                $who_pre = "<p style='color: #BABABA'>От ".$who."</p>";
                $accept = "<form action='$acceptlink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Удалить'><i class=\"fa fa-check fa-lg\"></i></button></form>";
                $canсell = "<form action='$canсelllink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Отклонить'><i class=\"fa fa-ban fa-lg\"></i></button></form>";
                return $who_pre.$accept.$canсell;
            case "completed":
                $acceptlink = route('object.activate',['object'=>$object->alias]);
                $deletelink = route('object.softDelete',['object'=>$object->alias]);
                $accept = "<form action='$acceptlink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Активировать'><i class=\"fa fa-bell fa-lg\"></i></button></form>";
                $delete = "<form action='$deletelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                return $accept.$delete;
            case "deleted":
                $who = $object->deletedUser->name;
                $acceptlink = route('object.destroy',['object'=>$object->alias]);
                $restorelink = route('object.restore',['object'=>$object->alias]);
                $who_delete = "<p style='color: #BABABA'>От ".$who."</p>";
                $accept = "<form action='$acceptlink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Удалить навсегда'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                $restore = "<form action='$restorelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Восстановить'><i class=\"fa fa-reply fa-lg\"></i></button></form>";
                return $who_delete.$accept.$restore;
            default:
                if ($user->role != "user") {
                    $editlink = route('object.update',['object'=>$object->alias]);
                    $worklink = route('object.prework',['object'=>$object->alias]);
                    if ($object->preworkingUser != null || $object->workingUser != null) {
                        $inwork = "<i class=\"fa fa-gears fa-lg disabled\"></i>";
                    } else {
                        $inwork = "<form action='$worklink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Взять в работу'><i class=\"fa fa-gears fa-lg\"></i></button></form>";
                    }
                    $deletelink = route('object.softDelete',['object'=>$object->alias]);
                    if($object->workingUser == null || $user->role == "admin")  {
                        $delete = "<form action='$deletelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                        $edit = "<a href='$editlink' title='Редактировать'><i class=\"fa fa-edit fa-lg\"></i></a>";
                    } else {
                        if(($object->workingUser->id == $user->id) || $user->role == "admin") {
                            $delete = "<a href='$deletelink' title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></a>";
                            $edit = "<a href='$editlink' title='Редактировать'><i class=\"fa fa-edit fa-lg\"></i></a>";
                        } else {
                            $delete = "<i class=\"fa fa-trash fa-lg disabled\"></i>";
                            $edit = "<i class=\"fa fa-edit fa-lg disabled\"></i>";
                        }
                    }
                } else {
                    $editlink = route('object.update',['object'=>$object->alias]);
                    $inwork = "<i class=\"fa fa-gears fa-lg disabled\"></i>";
                    $deletelink = route('object.softDelete',['object'=>$object->alias]);
                    $delete = "<form action='$deletelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='action' type='submit' title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                    $edit = "<a href='$editlink' title='Редактировать'><i class=\"fa fa-edit fa-lg\"></i></a>";
                }
                $favorites = "";
                return $edit.$inwork.$favorites.$delete;
        }
    }
}
