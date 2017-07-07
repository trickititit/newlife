<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Object;
use App\Repositories\ObjectsRepository;
use App\Repositories\CitiesRepository;
use App\Repositories\AreasRepository;
use Illuminate\Support\Facades\Session;
use App\Components\JavaScriptMaker;
use Menu;
use Gate;
use URL;
use Route;

class ObjectController extends SiteController
{
    public function __construct(ObjectsRepository $o_rep, CitiesRepository $city_rep, AreasRepository $area_rep) {
        parent::__construct(new \App\Repositories\AdmMenusRepository(new \App\AdmMenu), new \App\Repositories\SettingsRepository(new \App\Setting), new \App\Object);

//        if(Gate::denies('VIEW_ADMIN')) {
//            abort(403);
//        }

        $this->inc_css_lib = array_add($this->inc_css_lib,  'adm-filter', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/adm.filter.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,  'jq-ui', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/lib/jqueryui/jquery-ui.min.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,  'light-gallery', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/lightgallery.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,  'light-slider', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/lightslider.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,  'bx-slider', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/jquery.bxslider.css">'));
        $this->inc_js_lib = array_add($this->inc_js_lib,    'light-gallery', array('url' => '<script src="'.$this->pub_path.'/js/lightgallery.js"></script>'));
        $this->inc_js_lib = array_add($this->inc_js_lib,    'light-slider', array('url' => '<script src="'.$this->pub_path.'/js/lightslider.js"></script>'));
        $this->inc_js_lib = array_add($this->inc_js_lib,    'bx-slider', array('url' => '<script src="'.$this->pub_path.'/js/jquery.bxslider.min.js"></script>'));
        $this->inc_js_lib = array_add($this->inc_js_lib,    'yandex-map', array('url' => '<script src="//api-maps.yandex.ru/2.0/?lang=ru-RU&load=package.full"></script>'));
        $this->template = config('settings.theme').'.index';
        $this->o_rep = $o_rep;
        $this->city_rep = $city_rep;
        $this->area_rep = $area_rep;
       }

    public function index(JavaScriptMaker $jsmaker, Object $object) {
        $this->title = $this->o_rep->getTitle($object);
        $obj_image= $this->o_rep->getObjImage($object);
        $gallery = view(config('settings.theme').'.gallery')->with(array("images" => $object->images));
        $this->content = view(config('settings.theme').'.object')->with(array("title" => $this->title, "object" => $object, "gallery" => $gallery, "obj_image" => $obj_image));
        $jsmaker->setJs("obj-view", $object, ($this->spec_offer_count > 3)? false : true, "", $this->randStr);
        return $this->renderOutput();
    }
}
