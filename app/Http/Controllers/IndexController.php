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

    public function avito() {
//        try {
//            echo(shell_exec('c:\openServer\domains\newlife\phantomjs\bin\phantomjs.exe c:\openServer\domains\newlife\phantomjs\bin\avito.js'));
//            flush();
//        } catch (Exception $exc) {
//            echo('Ошибка!');
//            echo $exc->getTraceAsString();
//        }
        exec('c:\openServer\domains\newlife\phantomjs\bin\phantomjs c:\openServer\domains\newlife\phantomjs\bin\avito.js', $output);
        foreach ($output as $object) {
            $object = json_decode($object);
            $object->category = mb_strtolower($object->category);
            if ($object->category == "квартиры") {
                $object->category = 1;
            } elseif ($object->category == "комнаты") {
                $object->category = 3;
            } elseif ($object->category == "дома, дачи, коттеджи") {
                $object->category = 2;
            }
            $object->title_obj = explode(" ", $object->title_obj);
            dump($object);
            switch ($object->category) {
                case '1':
                    # code...
                    break;
                case '2':
                    # code...
                    break;
                case '3':
                    # code...
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

public function findParamOnString($string, $category, $param) {
    switch ($category) {
        case '1':
            switch ($param) {
                case 'room':
                    for($i = 1; $i > 11; $i++) {
                        if ($string[1] == "$i-к") {
                            return $i;
                        }
                    }
                    break;
                case 'square':
                    return (int)$string[3];
                    # code...
                    break;
                case 'floor':
                    return (int)$string[5];
                    # code...
                    break;
                case 'house_floor':
                    for($i = 1; $i > 11; $i++) {
                        if ($string[1] == "$i-этажного") {
                            return $i;
                        }
                    }
                    # code...
                    break;
                case 'build_type':
                    switch ($string[6]) {
                        case 'кирпичного':
                            return "кирпич";
                            break;
                        case 'блочного':
                            return "блок";
                            break;
                        default:
                            # code...
                            break;
                    }
                    # code...
                    break;
                default:
                    # code...
                    break;
            }
            break;
        case '2':
        case 'room':
            for($i = 1; $i > 11; $i++) {
                if ($string[1] == "$i-к") {
                    return $i;
                }
            }
            break;
        case 'square':
            return (int)$string[3];
            # code...
            break;
        case 'floor':
            return (int)$string[5];
            # code...
            break;
        case 'price':
            return $this->getAllInt($string[2]);
            # code...
            break;
        case 'house_floor':
            for($i = 1; $i > 11; $i++) {
                if ($string[1] == "$i-этажный") {
                    return $i;
                }
            }
            # code...
            break;
        case 'build_type':
            switch ($string[6]) {
                case 'кирпичного':
                    return "кирпич";
                    break;
                case 'блочного':
                    return "блок";
                    break;
                default:
                    # code...
                    break;
            }
            # code...
            break;
        case '3':
            # code...
            break;
        default:
            # code...
            break;
    }
}

public function getAllInt($string) {
    $result = "";
    preg_match_all("/\d/", $string, $result);
    return $result;
}
}
