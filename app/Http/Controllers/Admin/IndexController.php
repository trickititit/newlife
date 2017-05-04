<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ObjectsRepository;
use Menu;
use Gate;
use URL;
use Route;

class IndexController extends AdminController {

    protected $o_rep;

    public function __construct(ObjectsRepository $o_rep) {
        parent::__construct(new \App\Repositories\AdmMenusRepository(new \App\AdmMenu), new \App\Repositories\SettingsRepository(new \App\Setting()));

//        if(Gate::denies('VIEW_ADMIN')) {
//            abort(403);
//        }
        $this->template = config('settings.theme').'.admin.index';
        $this->o_rep = $o_rep;
    }

    public function index(Request $request, $type = 'default', $order = "created_at") {
        $this->checkUser();
        $objects = $this->o_rep->getScope($type, false, false, $order, $this->settings["pagination"]);
        $actions = array();
        foreach ($objects as $object) {
            $actions = array_add($actions,"object".$object->id, $this->getActions($object, $this->user, $type));
            $object->client = json_decode($object->client);
        }
        if ($request->route("type") == null) {
            $link = URL::current()."/default/";
        } else {
            $link = route(Route::current()->getName(), ['order' => '', 'type' => $type])."/";
        }
        $order_select = array($link."created_at" => "По дате", $link."price" => "Дешевле", $link."pricedesc" => "Дороже");
        $menus = $this->getObjectsMenu();
        $this->content = view(config('settings.theme').'.admin.objects')->with(array("objects" => $objects, "menus" => $menus, "actions" => $actions, "order_select" => $order_select, "type" => $type))->render();
        $this->title = 'Личный кабинет';

        return $this->renderOutput();
    }
    
    private function getObjectsMenu() {

        $menu = $this->m_rep->getMenu("object");

            $mBuilder = Menu::make('objectNav', function($m) use ($menu) {

                foreach($menu as $item) {
                    if($item->parent == 0) {
                        $count = $this->o_rep->getScope($item->alias, false, true);
                        $m->add($item->title,array('url' => route($item->path, ["type" => (($item->alias == "default")? "" : $item->alias)]), 'id' => $item->id))->data(array('icon' => $item->icon,"count" => $count, "type" => $item->alias ));
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
                $editlink = route('object.edit',['object'=>$object->alias]);
                $unworklink = route('object.unwork',['object'=>$object->alias]);
                $uninwork = "<form action='$unworklink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Убрать из работы'><i class=\"fa fa-gear fa-lg\"></i></button></form>";
                $deletelink = route('object.softDelete',['object'=>$object->alias]);
                $delete = "<form action='$deletelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                $edit = "<a class='btn btn-secondary btn-sm' href='$editlink' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Редактировать'><i class=\"fa fa-edit fa-lg\"></i></a>";
                $favorites = "";
                return $edit.$uninwork.$favorites.$delete;
            case "prework":
                $who = $object->preworkingUser->name;
                $acceptlink = route('object.accessPreWork',['object'=>$object->alias]);
                $canсelllink = route('object.cancelPreWork',['object'=>$object->alias]);
                $who_pre = "<p style='color: #BABABA'>От ".$who."</p>";
                $accept = "<form action='$acceptlink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Подтвердить'><i class=\"fa fa-check fa-lg\"></i></button></form>";
                $canсell = "<form action='$canсelllink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Отклонить'><i class=\"fa fa-ban fa-lg\"></i></button></form>";
                return $who_pre.$accept.$canсell;
            case "completed":
                $acceptlink = route('object.activate',['object'=>$object->alias]);
                $deletelink = route('object.softDelete',['object'=>$object->alias]);
                $accept = "<form action='$acceptlink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Активировать'><i class=\"fa fa-bell fa-lg\"></i></button></form>";
                $delete = "<form action='$deletelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                return $accept.$delete;
            case "deleted":
                $who = $object->deletedUser->name;
                $acceptlink = route('object.destroy',['object'=>$object->alias]);
                $restorelink = route('object.restore',['object'=>$object->alias]);
                $who_delete = "<p style='color: #BABABA'>От ".$who."</p>";
                $accept = "<form action='$acceptlink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Удалить навсегда'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                $restore = "<form action='$restorelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Восстановить'><i class=\"fa fa-reply fa-lg\"></i></button></form>";
                return $who_delete.$accept.$restore;
            default:
                if ($user->role != "user") {
                    $editlink = route('object.edit',['object'=>$object->alias]);
                    $worklink = route('object.prework',['object'=>$object->alias]);
                    if ($object->preworkingUser != null || $object->workingUser != null) {
                        $inwork = "<button type=\"button\" class=\"btn btn-secondary btn-sm disabled\"><i class=\"fa fa-gears fa-lg\"></i></button>";
                    } else {
                        $inwork = "<form action='$worklink' method='post'><input type=\"hidden\" name=\"_method\" value=\"PUT\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Взять в работу'><i class=\"fa fa-gears fa-lg\"></i></button></form>";
                    }
                    $deletelink = route('object.softDelete',['object'=>$object->alias]);
                    if($object->workingUser == null || $user->role == "admin")  {
                        $delete = "<form action='$deletelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                        $edit = "<a class='btn btn-secondary btn-sm' href='$editlink' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Редактировать'><i class=\"fa fa-edit fa-lg\"></i></a>";
                    } else {
                        if(($object->workingUser->id == $user->id) || $user->role == "admin") {
                            $delete = "<form action='$deletelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                            $edit = "<a class='btn btn-secondary btn-sm' href='$editlink' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Редактировать'><i class=\"fa fa-edit fa-lg\"></i></a>";
                        } else {
                            $delete = "<button type=\"button\" class=\"btn btn-secondary btn-sm disabled\"><i class=\"fa fa-trash fa-lg disabled\"></i></button>";
                            $edit = "<button type=\"button\" class=\"btn btn-secondary btn-sm disabled\"><i class=\"fa fa-edit fa-lg disabled\"></i></button>";
                        }
                    }
                } else {
                    $editlink = route('object.edit',['object'=>$object->alias]);
                    $inwork = "<button type=\"button\" class=\"btn btn-secondary btn-sm disabled\"><i class=\"fa fa-gears fa-lg disabled\"></i></button>";
                    $deletelink = route('object.softDelete',['object'=>$object->alias]);
                    $delete = "<form action='$deletelink' method='post'><input type=\"hidden\" name=\"_method\" value=\"DELETE\"><input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\"><button class='btn btn-secondary btn-sm' type='submit' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Удалить'><i class=\"fa fa-trash fa-lg\"></i></button></form>";
                    $edit = "<a class='btn btn-secondary btn-sm' href='$editlink' data-toggle=\"tooltip\" data-placement=\"bottom\" title='Редактировать'><i class=\"fa fa-edit fa-lg\"></i></a>";
                }
                $favorites = "";
                return $edit.$inwork.$favorites.$delete;
        }
    }
}
