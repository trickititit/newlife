<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ObjectsRepository;
use App\Repositories\CitiesRepository;
use App\Repositories\AreasRepository;
use Gate;

class ObjectsController extends AdminController
{
    public $o_rep;
    public $city_rep;
    public $area_rep;

    public function __construct(ObjectsRepository $o_rep, CitiesRepository $city_rep, AreasRepository $area_rep) {
        parent::__construct(new \App\Repositories\AdmMenusRepository(new \App\AdmMenu));

//        if(Gate::denies('VIEW_ADMIN')) {
//            abort(403);
//        }
        $this->template = config('settings.theme').'.admin.index';
        $this->o_rep = $o_rep;
        $this->city_rep = $city_rep;
        $this->area_rep = $area_rep;
        $this->inc_css_lib = array_add($this->inc_css_lib,'dropzone', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/dropzone.css">'));
        $this->inc_css_lib = array_add($this->inc_css_lib,'jq-steps', array('url' => '<link rel="stylesheet" href="'.$this->pub_path.'/css/separate/vendor/jquery-steps.min.css">'));
        $this->inc_js_lib = array_add($this->inc_js_lib,'dropzone',array('url' => '<script src="'.$this->pub_path.'/js/dropzone.js"></script>'));
        $this->inc_js_lib = array_add($this->inc_js_lib,'jq-validate', array('url' => '<script src="'.$this->pub_path.'/js/lib/jquery-validation/jquery.validate.min.js"></script>'));
        $this->inc_js_lib = array_add($this->inc_js_lib,'jq-steps', array('url' => '<script src="'.$this->pub_path.'/js/lib/jquery-steps/jquery.steps.min.js"></script>'));
        $this->inc_js_lib = array_add($this->inc_js_lib, 'y-maps', array('url' => '<script src="//api-maps.yandex.ru/2.0/?lang=ru-RU&load=package.full"></script>'));
        $this->inc_js_lib = array_add($this->inc_js_lib, 'adr_se', array('url' => '<script src="'.$this->pub_path.'/js/search_address.js"></script>'));
    }

    public function create() {
        $this->checkUser();
        $cities = $this->city_rep->get();
        $areas = $this->area_rep->get();
        $this->inc_js = "<script>
                ymaps.ready(function () {
                var myMap = window.map = new ymaps.Map('YMapsID', {
                            center: [48.7979,44.7462],
                            zoom: 16,
                            behaviors: ['default']
                        }),
                        searchControl = new SearchAddress(myMap, $('#objCreate'));
                myMap.controls.add(
                        new ymaps.control.ZoomControl()
                );
                myMap.controls.add('typeSelector')
                });
                    $(function() {
                        var form = $(\"#objCreate\");
                        form.validate({
                            debug: true,
                            rules: {
                                agree: {
                                    required: true
                                }
                            },
                            errorPlacement: function errorPlacement(error, element) { element.closest('.form-group').find('.form-control').after(error); },
                            highlight: function(element) {
                                $(element).closest('.form-group').addClass('has-error');
                            },
                            unhighlight: function(element) {
                                $(element).closest('.form-group').removeClass('has-error');
                            }
                        });
                        form.children(\"div\").steps({
                            headerTag: \"h3\",
                            bodyTag: \"section\",
                            transitionEffect: \"slideLeft\",
                            onStepChanging: function (event, currentIndex, newIndex)
                            {
                                form.validate().settings.ignore = \":disabled,:hidden\";
                                return form.valid();
                            },
                            onFinishing: function (event, currentIndex)
                            {
                                form.validate().settings.ignore = \":disabled\";
                                return form.valid();
                            },
                            onFinished: function (event, currentIndex)
                            {
                                alert(\"Submitted!\");
                            },
                            labels: {
                                finish: \"Конец\",
                                next: \"Далее\",
                                previous: \"Назад\"
                            }
                        });
                    });
                    Dropzone.options.myDropzone = {
                            paramName: \"image\",
                            acceptedFiles: \"image/*\",
                            maxFilesize: 100,
                            addRemoveLinks: true,
                            maxFiles: 20,
                            removedfile: function(file) {
                                var id = $('#obj-id').val();
                                var name = file.name;
                                var tmp_img = $('#tmp-img').val();
                                var token = '".csrf_token()."';
                                $.ajax({
                                    type: 'POST',
                                    url: '".route('adminObjDelImg')."',
                                    data: \"file=\"+name+\"&obj_id=\"+id+\"&tmp_img=\"+tmp_img+\"&_token=\"+token,
                                    dataType: 'html'
                                });
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            },
                            init: function () {
                                thisDropzone = this;
                                <!-- 4 -->
                                $.get('".route('adminObjGetImg')."', function (data) {
                    
                                    <!-- 5 -->
                                    $.each(data, function (index, item) {
                                        //// Create the mock file:
                                        var mockFile = {
                                            name: item.name,
                                            size: item.size,
                                            status: Dropzone.ADDED,
                                            accepted: true
                                        };
                    
                                        // Call the default addedfile event handler
                                        thisDropzone.emit(\"addedfile\", mockFile);
                    
                                        // And optionally show the thumbnail of the file:
                                        //thisDropzone.emit(\"thumbnail\", mockFile, \"uploads/\"+item.name);
                    
                                        thisDropzone.createThumbnailFromUrl(mockFile, \"".asset(config('settings.theme'))."/uploads/images/\"+item.name);
                    
                                        thisDropzone.emit(\"complete\", mockFile);
                    
                                        thisDropzone.files.push(mockFile);
                    
                                    });
                    
                                });
                            }
                        };
        </script>";
        $rand_obj_id = rand(1,1000);
        $this->content = view(config('settings.theme').'.admin.objectCreate')->with(array('areas' => $areas, 'cities' => $cities, "obj_id" => $rand_obj_id))->render();
        $this->title = 'Создание нового объекта';

        return $this->renderOutput();
    }
}
