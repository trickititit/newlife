<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\ObjectsRepository;
use App\Repositories\CitiesRepository;
use App\Repositories\AreasRepository;
use Illuminate\Support\Facades\Session;
use App\Components\JavaScriptMaker;
use Excel;
use Menu;
use Gate;
use URL;
use Route;

class IndexController extends AdminController {

    protected $o_rep;
    protected $city_rep;
    protected $area_rep;

    public function __construct(ObjectsRepository $o_rep, CitiesRepository $city_rep, AreasRepository $area_rep) {
        parent::__construct(new \App\Repositories\AdmMenusRepository(new \App\AdmMenu), new \App\Repositories\SettingsRepository(new \App\Setting()), new \App\User);

//        if(Gate::denies('VIEW_ADMIN')) {
//            abort(403);
//        }
        
        $this->inc_css_lib = array_add($this->inc_css_lib,  'adm-filter', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/adm.filter.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,  'jq-ui', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/lib/jqueryui/jquery-ui.min.css">'));
        $this->inc_js_lib = array_add($this->inc_js_lib,'jq-ui',array('url' => '<script src="'.$this->pub_path.'/js/lib/jqueryui/jquery-ui.min.js"></script>'));
        $this->template = config('settings.theme').'.admin.index';
        $this->o_rep = $o_rep;
        $this->city_rep = $city_rep;
        $this->area_rep = $area_rep;
        // INIT INPUTS
        $this->inputs = array_add($this->inputs, "obj_category", array("1" => "Квартира", "2" => "Дом, Дача, Таунхаус", "3" => "Комната"));
        $this->inputs = array_add($this->inputs, "obj_deal", array("" => "Тип сделки","Продажа" => "Продажа", "Обмен" => "Обмен"));
        $this->inputs = array_add($this->inputs, "obj_form_1", array("Вторичка" => "Вторичка", "Новостройка" => "Новостройка"));
        $this->inputs = array_add($this->inputs, "obj_form_2", array("Дом" => "Дом", "Дача" => "Дача", "Коттедж" => "Коттедж", "Таунхаус" => "Таунхаус"));
        $this->inputs = array_add($this->inputs, "obj_form_3", array("" => "Тип объекта","Гостиничного" => "Гостиничного", "Коридорного" => "Коридорного", "Секционного" => "Секционного", "Коммунальная" => "Коммунальная"));
        $this->inputs = array_add($this->inputs, "obj_room", array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "9+"));
        $this->inputs = array_add($this->inputs, "obj_home_floors_2", array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5+"));
        $this->inputs = array_add($this->inputs, "obj_build_type_1", array("Кирпичный" => "Кирпичный", "Панельный" => "Панельный", "Блочный" => "Блочный", "Монолитный" => "Монолитный", "Деревянный" => "Деревянный"));
        $this->inputs = array_add($this->inputs, "obj_build_type_2", array("Кирпич" => "Кирпич", "Брус" => "Брус", "Бревно" => "Бревно", "Металл" => "Металл", "Пеноблоки" => "Пеноблоки", "Сендвич-панели" => "Сендвич-панели", "Ж/б панели" => "Ж/б панели", "Экспериментальные материалы" => "Экспериментальные материалы"));
        $this->inputs = array_add($this->inputs, "obj_floor", array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20"));
        $this->inputs = array_add($this->inputs, "obj_distance", array("0" => "В черте города", "10" => "10 км", "20" => "20 км", "30" => "30 км", "50" => "50 км", "70" => "70+ км"));
        $this->inputs = array_add($this->inputs, "obj_home_floors_1", array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20"));
    }

    public function index(JavaScriptMaker $jsmaker, Request $request, $type = 'default', $order = ["created_at", "desc"]) {
        $this->checkUser();
        $cities = $this->city_rep->get();
        $obj_city = array();
        $obj_city = array_add($obj_city, "", "По всем городам");
        foreach ($cities as $city) {
            $obj_city = array_add($obj_city, $city->id, $city->name );
        }
        $this->inputs = array_add($this->inputs, "cities", $obj_city);
        $objects = $this->o_rep->getScope($type, $request, false, $order, $this->settings["pagination"]);
        $actions = array();
        foreach ($objects as $object) {
            $actions = array_add($actions,"object".$object->id, $this->getActions($object, $this->user, $type));
            $object->client = json_decode($object->client);
        }
        // FIXME: СОРТИРОВАКА ПРИ ПОИСКЕ
        if ($request->route("type") == null) {
            $link = URL::current()."/default/";
        } else {
            $link = route(Route::current()->getName(), ['order' => '', 'type' => $type])."/";
        }
        $order_select = array($link."created_at" => "По дате", $link."price" => "Дешевле", $link."pricedesc" => "Дороже");
        $menus = $this->getObjectsMenu();
        if ($request->has("search")) {
            $jsmaker->setJs("filter", $request, false, "", $this->randStr);
            $filter_data = $this->getFilterData($request->except("search"));
            Session::flash('search_status', count($objects));
        } else {
            $jsmaker->setJs("filter", "", true, "", $this->randStr);
            $filter_data = $request->except("search");
        }
        $filter = view(config('settings.theme').'.admin.filter')->with(array("inputs" => $this->inputs, "cities" => $cities, "data" => $filter_data));
        $this->content = view(config('settings.theme').'.admin.objects')->with(array("objects" => $objects, "menus" => $menus, "actions" => $actions, "order_select" => $order_select, "type" => $type, "filter" => $filter))->render();
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
            return $mBuilder;
    }
    
    private function getFilterData($data) {
        if (isset($data["city"])) {
            if (isset($data["area".$data["city"]])) {
                if ((count($data["area" . $data["city"]]) > 1)) {
                    $data["value_area" . $data["city"]] = "Район (" . count($data["area" . $data["city"]]) . ")";
                } else {
                    $where = array("id", $data["area" . $data["city"]][0]);
                    $area = $this->area_rep->get("*", false, false, $where);
                    $data["value_area" . $data["city"]] = $area[0]->name;
                }
            }
        }
        if (isset($data["room"])) {
            if (count($data["room"]) > 1) {
               $data["value_rooms"] = "Типов кол. комнат (" .count($data["room"]). ")";
            } else {
               $data["value_rooms"] = $data["room"][0]. "-к";
            }
        }
        if (isset($data["typeObj_2"])) {
            if (count($data["typeObj_2"]) > 1) {
                $data["value_typeObj_2"] = "Вид объекта (" .count($data["typeObj_2"]). ")";
            } else {
                $data["value_typeObj_2"] = $data["typeObj_2"][0];
            }
        }
        if (isset($data["typeObj_2"])) {
            if (count($data["typeObj_2"]) > 1) {
                $data["value_typeObj_2"] = "Вид объекта (" .count($data["typeObj_2"]). ")";
            } else {
                $data["value_typeObj_2"] = $data["typeObj_2"][0];
            }
        }
        if (isset($data["typeHouse_2"])) {
            if (count($data["typeHouse_2"]) > 1) {
                $data["value_typeHouse_2"] = "Материал стен (" .count($data["typeHouse_2"]). ")";
            } else {
                $data["value_typeHouse_2"] = $data["typeHouse_2"][0];
            }
        }
        if (isset($data["typeHouse_1"])) {
            if (count($data["typeHouse_1"]) > 1) {
                $data["value_typeHouse_1"] = "Тип Дома (" .count($data["typeHouse_1"]). ")";
            } else {
                $data["value_typeHouse_1"] = $data["typeHouse_1"][0];
            }
        }
        return $data;
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
