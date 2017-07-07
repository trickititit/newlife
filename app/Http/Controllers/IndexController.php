<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Object;
use App\Post;
use App\Repositories\ObjectsRepository;
use App\Repositories\CitiesRepository;
use App\Repositories\AreasRepository;
use Illuminate\Support\Facades\Session;
use App\Components\JavaScriptMaker;
use Menu;
use Gate;
use URL;
use Route;

class IndexController extends SiteController
{
    public function __construct(ObjectsRepository $o_rep, CitiesRepository $city_rep, AreasRepository $area_rep) {
        parent::__construct(new \App\Repositories\AdmMenusRepository(new \App\AdmMenu), new \App\Repositories\SettingsRepository(new \App\Setting), new \App\Object);

//        if(Gate::denies('VIEW_ADMIN')) {
//            abort(403);
//        }

        $this->inc_css_lib = array_add($this->inc_css_lib,  'jq-ui', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/lib/jqueryui/jquery-ui.min.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,  'da-slider', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/site.slider.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,  'bx-slider', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/jquery.bxslider.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,  'hover', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/hover.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,  'modernizr', array('url' => '<script src="'.$this->pub_path.'/js/modernizr.custom.28468.js"></script>'));
        $this->inc_js_lib = array_add($this->inc_js_lib,    'bx-slider', array('url' => '<script src="'.$this->pub_path.'/js/jquery.bxslider.min.js"></script>'));
        $this->inc_js_lib = array_add($this->inc_js_lib,    'cs-slider', array('url' => '<script src="'.$this->pub_path.'/js/jquery.cslider.js"></script>'));
        $this->template = config('settings.theme').'.index';
        $this->o_rep = $o_rep;
        $this->city_rep = $city_rep;
        $this->area_rep = $area_rep;
    }

    public function index(JavaScriptMaker $jsmaker, Post $post) {
        $this->title = "Агенство недвижимости Новая Жизнь";
        $posts = $post->OnMain()->get();
        $faq_posts = $post->FAQ()->get();
        $this->content = view(config('settings.theme').'.front')->with(['posts' => $posts, 'faq' => $faq_posts]);
        $jsmaker->setJs("front", "", ($this->spec_offer_count > 3)? false : true, "", $this->randStr);
        return $this->renderOutput();
    }
}
