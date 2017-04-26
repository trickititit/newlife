<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\AdmMenusRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Menu;

class AdminController extends Controller
{
    protected $c_rep;

    protected $m_rep;

    protected $o_rep;

    protected $a_rep;

    protected $user;

    protected $pub_path;

    protected $inc_css_lib = FALSE;

    protected $inc_js_lib = FALSE;

    protected $inc_css = FALSE;

    protected $inc_js = FALSE;

    protected $template;

    protected $content = FALSE;

    protected $title;

    protected $vars;

    public function __construct(AdmMenusRepository $m_rep) {
        $this->pub_path = asset(config('settings.theme'));
        $this->inc_css_lib = array(
            'font-awesome' => array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/lib/font-awesome/font-awesome.min.css">'),
            'bootstrap' => array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/lib/bootstrap/bootstrap.min.css">'),
            'main' => array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/main.css">'),
            'style' => array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/style.css">'),
            );
        $this->inc_js_lib = array(
            'jq' => array('url' => '<script src="'.$this->pub_path.'/js/lib/jquery/jquery.min.js"></script>'),
            'tether' => array('url' => '<script src="'.$this->pub_path.'/js/lib/tether/tether.min.js"></script>'),
            'bootstrap' => array('url' => '<script src="'.$this->pub_path.'/js/lib/bootstrap/bootstrap.min.js"></script>'),
            'plugins' => array('url' => '<script src="'.$this->pub_path.'/js/plugins.js"></script>'),
            'notify' => array('url' => '<script src="'.$this->pub_path.'/js/lib/bootstrap-notify/bootstrap-notify.min.js"></script>'),
        );
        $this->m_rep = $m_rep;
    }
    
    public function checkUser() {
        $this->user = Auth::user();
        if(!$this->user) {
            abort(403);
        }
    }

    public function renderOutput() {
        $this->vars = array_add($this->vars,'title',$this->title);

        $menu = $this->getMenu();

        $navigation = view(config('settings.theme').'.admin.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);
//
        if($this->content) {
            $this->vars = array_add($this->vars,'content',$this->content);
        }
        
        if($this->inc_css_lib) {
            $this->vars = array_add($this->vars,'inc_css_lib',$this->inc_css_lib);
        }

        if($this->inc_js_lib) {
            $this->vars = array_add($this->vars,'inc_js_lib',$this->inc_js_lib);
        }

        if($this->inc_js) {
            $this->vars = array_add($this->vars,'inc_js',$this->inc_js);
        }
//
//        $footer = view(config('settings.theme').'.admin.footer')->render();
//        $this->vars = array_add($this->vars,'footer',$footer);

        return view($this->template)->with($this->vars);




    }

    public function getMenu() {

        $menu = $this->m_rep->getMenu("left");

        $mBuilder = Menu::make('leftNav', function($m) use ($menu) {

            foreach($menu as $item) {

                if($item->parent == 0) {
                    $m->add($item->title,array('url' => route($item->path), 'id' => $item->id))->data('icon', $item->icon);
                }
                else {
                    if($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title,route($item->path))->id($item->id);
                    }
                }
            }

        });

        //dd($mBuilder);

        return $mBuilder;
    }
    //
}
