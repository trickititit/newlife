<?php
/**
 * Created by PhpStorm.
 * User: Трик
 * Date: 15.05.2017
 * Time: 22:43
 */
namespace App\Components;

use Storage;

class JavaScriptMaker {

    protected $content;
    protected $typeScript;
    protected $script_js;
    protected $cat_script_js;
    protected $specOffer_js;

    public function setJs($type, $request = "", $static = true, $token = "", $randStr, $specOffer = false) {

        $this->specOffer_js = "
            $('.slider4').bxSlider({
                            slideWidth: 360,
                            minSlides: 3,
                            maxSlides: 3,
                            moveSlides: 1,
                            slideMargin: 10,
                            pager: false
                        });
        ";
        $this->script_js = "
        $('#amount-area_1').click(function () {
        $('#area_1_search').toggle();
        });
        $('#amount-area_2').click(function () {
            $('#area_2_search').toggle();
        });
        $('#amount-floor').click(function () {
           $('#floor_search').toggle();
        });
        $('#amount-floorInObj_1').click(function () {
            $('#floorInObj_1_search').toggle();
        });
        $('#amount-floorInObj_2').click(function () {
            $('#floorInObj_2_search').toggle();
        });
        $('#amount-typeHouse_1').click(function () {
            $('#typeHouse_1_search').toggle();
        });
        $('#amount-typeHouse_2').click(function () {
            $('#typeHouse_2_search').toggle();
        });
        $('#amount-square_1').click(function () {
            $('#square_1_search').toggle();
        });
        $('#amount-square_2').click(function () {
            $('#square_2_search').toggle();
        });
        $('#amount-square_earth').click(function () {
            $('#square_earth_search').toggle();
        });
        $('#amount-price').click(function () {
            $('#price_search').toggle();
        });
        $('#amount-rooms').click(function () {
            $('#rooms_search').toggle();
        });
        $('#amount-formObj_2').click(function () {
            $('#formObj_2_search').toggle();
        });
        $('#amount-distance').click(function () {
            $('#distance_search').toggle();
        });
        
        $('#city').change(function () {
            var myChoise = $ ('#city :selected').val();
            if (myChoise == 1) {
                $('#adr').css('width', '25%');
                $('#amount-area_1').show();
                $('#amount-area_2').hide();
            } else if (myChoise == 2) {
                $('#adr').css('width', '25%');
                $('#amount-area_1').hide();
                $('#amount-area_2').show();
            } else {
                $('#adr').css('width', '45%');
                $('#amount-area_1').hide();
                $('#amount-area_2').hide();
            }
    
        });
    
        $('#area_1_search :checkbox').change(function(){
            var checkCount = $ ('#area_1_search :checkbox:checked').length;
            if($(this).is(\":checked\")) {
                if (checkCount > 1) {
                    result_ = \"Район (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    result_ = \"Район\";
                } else {
                    result_ = $(this).parent(\"label\").text();
                }
                $('#amount-area_1').val(result_);
    
            } else {
                if (checkCount > 1) {
                    result_ = \"Район (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    var result_ = \"Район\";
                } else {
                    result_ = $('#area_1_search :checkbox:checked').parent(\"label\").text();
                }
                $('#amount-area_1').val(result_);
            }
        });
    
        $('#area_2_search :checkbox').change(function(){
            var checkCount = $ ('#area_2_search :checkbox:checked').length;
            if($(this).is(\":checked\")) {
                if (checkCount > 1) {
                    result_ = \"Район (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    result_ = \"Район\";
                } else {
                    result_ = $(this).parent(\"label\").text();
                }
                $('#amount-area_2').val(result_);
    
            } else {
                if (checkCount > 1) {
                    result_ = \"Район (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    var result_ = \"Район\";
                } else {
                    result_ = $ ('#area_2_search :checkbox:checked').parent(\"label\").text();
                }
                $('#amount-area_2').val(result_);
            }
        });
        
    
        $('#typeHouse_1_search :checkbox').change(function(){
            var checkCount = $ ('#typeHouse_1_search :checkbox:checked').length;
            if($(this).is(\":checked\")) {
                if (checkCount > 1) {
                    result_ = \"Тип Дома (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    result_ = \"Тип дома\";
                } else {
                    result_ = $(this).val();
                }
                $('#amount-typeHouse_1').val(result_);
    
            } else {
                if (checkCount > 1) {
                    result_ = \"Тип Дома (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    var result_ = \"Тип дома\";
                } else {
                    result_ = $ ('#typeHouse_1_search :checkbox:checked').val();
                }
                $('#amount-typeHouse_1').val(result_);
            }
        });
    
        $('#typeHouse_2_search :checkbox').change(function(){
            var checkCount = $ ('#typeHouse_2_search :checkbox:checked').length;
            if($(this).is(\":checked\")) {
                if (checkCount > 1) {
                    result_ = \"Материал стен (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    result_ = \"Материал стен\";
                } else {
                    result_ = $(this).val();
                }
                $('#amount-typeHouse_2').val(result_);
    
            } else {
                if (checkCount > 1) {
                    result_ = \"Материал стен (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    var result_ = \"Материал стен\";
                } else {
                    result_ = $ ('#typeHouse_2_search :checkbox:checked').val();
                }
                $('#amount-typeHouse_2').val(result_);
            }
        });
    
        $('#formObj_2_search :checkbox').change(function(){
            var checkCount = $ ('#formObj_2_search :checkbox:checked').length;
            if($(this).is(\":checked\")) {
                if (checkCount > 1) {
                    result_ = \"Вид объекта (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    result_ = \"Вид объекта\";
                } else {
                    result_ = $(this).val();
                }
                $('#amount-formObj_2').val(result_);
    
            } else {
                if (checkCount > 1) {
                    result_ = \"Вид объекта (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    var result_ = \"Вид объекта\";
                } else {
                    result_ = $ ('#formObj_2_search :checkbox:checked').val();
                }
                $('#amount-formObj_2').val(result_);
            }
        });
        
        $('#type').change(function () {
            var myChoise = $ ('#type :selected').val();
            if (myChoise == 2) {
                $('#formObj_3').hide();
                $('#amount-floor').hide();
                $('#amount-typeHouse_1').hide();
                $('#amount-floorInObj_1').hide();
                $('#formObj_1').hide();
                $('#typeHouse_1').hide();
                $('#amount-rooms').hide();
                $('#amount-formObj_2').show();
                $('#amount-typeHouse_2').show();
                $('#amount-square_earth').show();
                $('#amount-floorInObj_2').show();
                $('#typeHouse_2').show();
                $('#amount-square_2').show();
                $('#amount-distance').show();
                $('#amount-square_1').hide();
            } else if (myChoise == 3){
                $('#amount-typeHouse_2').hide();
                $('#amount-floorInObj_1').show();
                $('#formObj_3').show();
                $('#amount-floor').show();
                $('#amount-typeHouse_1').show();
                $('#formObj_1').hide();
                $('#typeHouse_1').show();
                $('#amount-rooms').show();
                $('#amount-formObj_2').hide();
                $('#amount-square_earth').hide();
                $('#amount-floorInObj_2').hide();
                $('#typeHouse_2').hide();
                $('#amount-square_2').hide();
                $('#amount-distance').hide();
                $('#amount-square_1').show();
            } else {
                $('#amount-typeHouse_2').hide();
                $('#amount-typeHouse_1').show();
                $('#formObj_3').hide();
                $('#amount-floor').show();
                $('#amount-floorInObj_1').show();
                $('#formObj_1').show();
                $('#typeHouse_1').show();
                $('#amount-rooms').show();
                $('#amount-formObj_2').hide();
                $('#amount-square_earth').hide();
                $('#amount-floorInObj_2').hide();
                $('#typeHouse_2').hide();
                $('#amount-square_2').hide();
                $('#amount-distance').hide();
                $('#amount-square_1').show();
            }
        });
        
        $('#price_search input[type=number]').change(function () {
            var minPrice = $('#min-price').val();
            var maxPrice = $('#max-price').val();        
            var summ;
            if ((minPrice == \"\") && (maxPrice == \"\")) {
                summ = \"Цена, руб\";
            } else if (minPrice == \"\" || minPrice == 0) {
                summ = \"До \" + maxPrice + \" руб\";
            } else if (maxPrice == \"\" || maxPrice == 0) {
                summ = \"От \" + minPrice + \" руб\";
            } else {
                summ = minPrice + \" - \" + maxPrice  + \" руб\";
            }
            $('#amount-price').val(summ);
        });
    
        var minPrice = $('#min-price').val();
        var maxPrice = $('#max-price').val();
        var summ;
        if ((minPrice == \"\") && (maxPrice == \"\")) {
            summ = \"Цена, руб\";
        } else if (minPrice == \"\" || minPrice == 0) {
            summ = \"До \" + maxPrice + \" руб\";
        } else if (maxPrice == \"\" || maxPrice == 0) {
            summ = \"От \" + minPrice + \" руб\";
        } else {
            summ = minPrice + \" - \" + maxPrice  + \" руб\";
        }
        $('#amount-price').val(summ);
    
        $('#rooms_search :checkbox').change(function () {
            var checkCount = $ ('#rooms_search :checkbox:checked').length;
            if($(this).is(\":checked\")) {
                if (checkCount > 1) {
                    result_ = \"Типов кол. комнат (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    result_ = \"Количество комнат\";
                } else {
                    result_ = $(this).val();
                    if ((result_ == \"Студия\") || (result_ == \"9+\")) {
                        result_ = result_;
                    }
                    else {
                        result_ = result_+ \"-к\";
                    }
                }
                $('#amount-rooms').val(result_);
    
            } else {
                if (checkCount > 1) {
                    result_ = \"Типов кол. комнат (\" + checkCount + \")\";
                } else if  (checkCount == 0) {
                    var result_ = \"Количество комнат\";
                } else {
                    result_ = $ ('#rooms_search :checkbox:checked').val();
                    if ((result_ == \"Студия\") || (result_ == \"9+\")) {
                        result_ = result_;
                    } else  {
                        result_ = result_+ \"-к\";
                    }
                }
                $('#amount-rooms').val(result_);
            }
        });
    
    
        // Скрыть блоки при нажатии во вне
    
        $(document).click(function(event) {
                if (!$(event.target).closest(\"#filter\").length) {
                    $(\"#area_1_search, #area_2_search, #floor_search, #floorInObj_1_search, #typeHouse_1_search, #typeHouse_2_search, #square_1_search, #square_2_search, #square_earth_search, #price_search, #rooms_search, #formObj_2_search, #distance_search\").hide(1);
                }
            event.stopPropagation();
        });
    
        $('#price input').keyup(function(){
            var price = $('#price input').val(),
                square = $('#square input').val();
            if ( $('#type_ select :selected').val() == '2' ) {
                square = $('#house_square input').val();
            }
            if ( square.length !== 0 ) {
                pricesquare = price/square;
                $('#price_square input').attr('value', Math.round(pricesquare));
            }
        });
    
        $('.favor').click( function () {
            if ($(this).hasClass(\"fa-star-o\")) {
                var data = { obj_id : $(this).find('id').text(), addfav : 1};
                $.get(\"ajax.php\", data, addFav);
            } else if ($(this).hasClass(\"fa-star\")) {
                var data = { obj_id : $(this).find('id').text(), delfav : 1};
                $.get(\"ajax.php\", data, delFav);
            }
        });
            function addFav (data) {
                $('id:contains(\"'+data.id+'\")').parent().removeClass(\"fa-star-o\").addClass(\"fa-star\");            
            }
    
        function delFav (data) {
            $('id:contains(\"'+data.id+'\")').parent().removeClass(\"fa-star\").addClass(\"fa-star-o\");
        }
    
        setTimeout(function(){\$('#box').fadeOut('fast')},3000);
        ";
        $this->cat_script_js = "
            $(document).ready(function() {
                $('#cat_amount-area_1').click(function () {
                    $('#cat_area_1_search').toggle(1);
                });
                $('#cat_amount-area_2').click(function () {
                    $('#cat_area_2_search').toggle(1);
                });
                $('#cat_amount-floor').click(function () {
                    $('#cat_floor_search').toggle(1);
                });
                $('#cat_amount-floorInObj_1').click(function () {
                    $('#cat_floorInObj_1_search').toggle(1);
                });
                $('#cat_amount-floorInObj_2').click(function () {
                    $('#cat_floorInObj_2_search').toggle(1);
                });
                $('#cat_amount-typeHouse_1').click(function () {
                    $('#cat_typeHouse_1_search').toggle(1);
                });
                $('#cat_amount-typeHouse_2').click(function () {
                    $('#cat_typeHouse_2_search').toggle(1);
                });
                $('#cat_amount-square_1').click(function () {
                    $('#cat_square_1_search').toggle(1);
                });
                $('#cat_amount-square_2').click(function () {
                    $('#cat_square_2_search').toggle(1);
                });
                $('#cat_amount-square_earth').click(function () {
                    $('#cat_square_earth_search').toggle(1);
                });
                $('#cat_amount-price').click(function () {
                    $('#cat_price_search').toggle(1);
                });
                $('#cat_amount-rooms').click(function () {
                    $('#cat_rooms_search').toggle(1);
                });
                $('#cat_amount-formObj_2').click(function () {
                    $('#cat_formObj_2_search').toggle(1);
                });
                $('#cat_amount-distance').click(function () {
                    $('#cat_distance_search').toggle(1);
                });
            
                $('#cat_city').change(function () {
                    var myChoise = $ ('#cat_city :selected').val();
                    if (myChoise == 1) {
                        $('#cat_amount-area_1').show();
                        $('#cat_amount-area_2').hide();
                    } else if (myChoise == 2) {
                        $('#cat_amount-area_1').hide();
                        $('#cat_amount-area_2').show();
                    } else {
                        $('#cat_amount-area_1').hide();
                        $('#cat_amount-area_2').hide();
                    }
            
                });
            
                $('#cat_area_1_search :checkbox').change(function(){
                    var checkCount = $ ('#cat_area_1_search :checkbox:checked').length;
                    if($(this).is(\":checked\")) {
                        if (checkCount > 1) {
                            result_ = \"Район (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            result_ = \"Район\";
                        } else {
                            result_ = $(this).val();
                        }
                        $('#cat_amount-area_1').val(result_);
            
                    } else {
                        if (checkCount > 1) {
                            result_ = \"Район (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            var result_ = \"Район\";
                        } else {
                            result_ = $ ('#cat_area_1_search :checkbox:checked').val();
                        }
                        $('#cat_amount-area_1').val(result_);
                    }
                });
            
                $('#cat_area_2_search :checkbox').change(function(){
                    var checkCount = $ ('#cat_area_2_search :checkbox:checked').length;
                    if($(this).is(\":checked\")) {
                        if (checkCount > 1) {
                            result_ = \"Район (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            result_ = \"Район\";
                        } else {
                            result_ = $(this).val();
                        }
                        $('#cat_amount-area_2').val(result_);
            
                    } else {
                        if (checkCount > 1) {
                            result_ = \"Район (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            var result_ = \"Район\";
                        } else {
                            result_ = $ ('#cat_area_2_search :checkbox:checked').val();
                        }
                        $('#cat_amount-area_2').val(result_);
                    }
                });
            
            
                $('#cat_typeHouse_1_search :checkbox').change(function(){
                    var checkCount = $ ('#cat_typeHouse_1_search :checkbox:checked').length;
                    if($(this).is(\":checked\")) {
                        if (checkCount > 1) {
                            result_ = \"Тип Дома (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            result_ = \"Тип дома\";
                        } else {
                            result_ = $(this).val();
                        }
                        $('#cat_amount-typeHouse_1').val(result_);
            
                    } else {
                        if (checkCount > 1) {
                            result_ = \"Тип Дома (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            var result_ = \"Тип дома\";
                        } else {
                            result_ = $ ('#cat_typeHouse_1_search :checkbox:checked').val();
                        }
                        $('#cat_amount-typeHouse_1').val(result_);
                    }
                });
            
                $('#cat_typeHouse_2_search :checkbox').change(function(){
                    var checkCount = $ ('#cat_typeHouse_2_search :checkbox:checked').length;
                    if($(this).is(\":checked\")) {
                        if (checkCount > 1) {
                            result_ = \"Материал стен (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            result_ = \"Материал стен\";
                        } else {
                            result_ = $(this).val();
                        }
                        $('#cat_amount-typeHouse_2').val(result_);
            
                    } else {
                        if (checkCount > 1) {
                            result_ = \"Материал стен (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            var result_ = \"Материал стен\";
                        } else {
                            result_ = $ ('#cat_typeHouse_2_search :checkbox:checked').val();
                        }
                        $('#cat_amount-typeHouse_2').val(result_);
                    }
                });
            
                $('#cat_formObj_2_search :checkbox').change(function(){
                    var checkCount = $ ('#cat_formObj_2_search :checkbox:checked').length;
                    if($(this).is(\":checked\")) {
                        if (checkCount > 1) {
                            result_ = \"Вид объекта (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            result_ = \"Вид объекта\";
                        } else {
                            result_ = $(this).val();
                        }
                        $('#cat_amount-formObj_2').val(result_);
            
                    } else {
                        if (checkCount > 1) {
                            result_ = \"Вид объекта (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            var result_ = \"Вид объекта\";
                        } else {
                            result_ = $ ('#cat_formObj_2_search :checkbox:checked').val();
                        }
                        $('#cat_amount-formObj_2').val(result_);
                    }
                });
            
                $('#cat_type').change(function () {
                    var myChoise = $ ('#cat_type :selected').val();
                    if (myChoise == 2) {
                        $('#cat_formObj_3').hide();
                        $('#cat_amount-floor').hide();
                        $('#cat_amount-typeHouse_1').hide();
                        $('#cat_amount-floorInObj_1').hide();
                        $('#cat_formObj_1').hide();
                        $('#cat_typeHouse_1').hide();
                        $('#cat_amount-rooms').hide();
                        $('#cat_amount-formObj_2').show();
                        $('#cat_amount-typeHouse_2').show();
                        $('#cat_amount-square_earth').show();
                        $('#cat_amount-floorInObj_2').show();
                        $('#cat_typeHouse_2').show();
                        $('#cat_amount-square_2').show();
                        $('#cat_amount-distance').show();
                        $('#cat_amount-square_1').hide();
                    } else if (myChoise == 3){
                        $('#cat_amount-typeHouse_2').hide();
                        $('#cat_amount-floorInObj_1').show();
                        $('#cat_formObj_3').show();
                        $('#cat_amount-floor').show();
                        $('#cat_amount-typeHouse_1').show();
                        $('#cat_formObj_1').hide();
                        $('#cat_typeHouse_1').show();
                        $('#cat_amount-rooms').show();
                        $('#cat_amount-formObj_2').hide();
                        $('#cat_amount-square_earth').hide();
                        $('#cat_amount-floorInObj_2').hide();
                        $('#cat_typeHouse_2').hide();
                        $('#cat_amount-square_2').hide();
                        $('#cat_amount-distance').hide();
                        $('#cat_amount-square_1').show();
                    } else {
                        $('#cat_amount-typeHouse_2').hide();
                        $('#cat_amount-typeHouse_1').show();
                        $('#cat_formObj_3').hide();
                        $('#cat_amount-floor').show();
                        $('#cat_amount-floorInObj_1').show();
                        $('#cat_formObj_1').show();
                        $('#cat_typeHouse_1').show();
                        $('#cat_amount-rooms').show();
                        $('#cat_amount-formObj_2').hide();
                        $('#cat_amount-square_earth').hide();
                        $('#cat_amount-floorInObj_2').hide();
                        $('#cat_typeHouse_2').hide();
                        $('#cat_amount-square_2').hide();
                        $('#cat_amount-distance').hide();
                        $('#cat_amount-square_1').show();
                    }
                });
            
                $('#cat_price_search input[type=number]').change(function () {
                    var minPrice = $('#cat_min-price').val();
                    var maxPrice = $('#cat_max-price').val();
                    var summ;
                    if ((minPrice == \"\") && (maxPrice == \"\")) {
                        summ = \"Цена, руб\";
                    } else if (minPrice == \"\" || minPrice == 0) {
                        summ = \"До \" + maxPrice + \" руб\";
                    } else if (maxPrice == \"\" || maxPrice == 0) {
                        summ = \"От \" + minPrice + \" руб\";
                    } else {
                        summ = minPrice + \" - \" + maxPrice  + \" руб\";
                    }
                    $('#cat_amount-price').val(summ);
                });
            
                var minPrice = $('#cat_min-price').val();
                var maxPrice = $('#cat_max-price').val();
                var summ;
                if ((minPrice == \"\") && (maxPrice == \"\")) {
                    summ = \"Цена, руб\";
                } else if (minPrice == \"\" || minPrice == 0) {
                    summ = \"До \" + maxPrice + \" руб\";
                } else if (maxPrice == \"\" || maxPrice == 0) {
                    summ = \"От \" + minPrice + \" руб\";
                } else {
                    summ = minPrice + \" - \" + maxPrice  + \" руб\";
                }
                $('#cat_amount-price').val(summ);
            
                $('#cat_rooms_search :checkbox').change(function () {
                    var checkCount = $ ('#cat_rooms_search :checkbox:checked').length;
                    if($(this).is(\":checked\")) {
                        if (checkCount > 1) {
                            result_ = \"Типов кол. комнат (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            result_ = \"Количество комнат\";
                        } else {
                            result_ = $(this).val();
                            if ((result_ == \"Студия\") || (result_ == \"9+\")) {
                                result_ = result_;
                            }
                            else {
                                result_ = result_+ \"-к\";
                            }
                        }
                        $('#cat_amount-rooms').val(result_);
            
                    } else {
                        if (checkCount > 1) {
                            result_ = \"Типов кол. комнат (\" + checkCount + \")\";
                        } else if  (checkCount == 0) {
                            var result_ = \"Количество комнат\";
                        } else {
                            result_ = $ ('#cat_rooms_search :checkbox:checked').val();
                            if ((result_ == \"Студия\") || (result_ == \"9+\")) {
                                result_ = result_;
                            } else  {
                                result_ = result_+ \"-к\";
                            }
                        }
                        $('#cat_amount-rooms').val(result_);
                    }
                });
            
            
                // Скрыть блоки при нажатии во вне
            
                $(document).click(function(event) {
                    if (!$(event.target).closest(\"#catalog_filter\").length) {
                        $(\"#cat_area_1_search, #cat_area_2_search, #cat_floor_search, #cat_floorInObj_1_search, #cat_typeHouse_1_search, #cat_typeHouse_2_search, #cat_square_1_search, #cat_square_2_search, #cat_square_earth_search, #cat_price_search, #cat_rooms_search, #cat_formObj_2_search, #cat_distance_search\").hide(1);
                    }
                    event.stopPropagation();
                });
                    $('#cat-kvart, #cat-house, #cat-komn').click(function(){
                        var show = $('#cat-sdelka').show(0);
                        $('#menu-cat-3 .menu-block').each(function () {
                            var show = $(this).css(\"display\");
                            if (show == \"block\") {
                                $(this).hide(0);
                            }
                        });
                    });
                    $('#cat-sdelka .elem-nav-cat').click(function(){
                         var id_target = $('#category .elem-nav-cat-active').attr('data-show');
                        $('#menu-cat-3 .menu-block').each(function () {
                            if ($(this).attr('id') == id_target) {
                                $(this).show(0);
                            } else {
                                $(this).hide(0);
                            }
                        });
            88172        });
                
                    $('.elem-nav-cat').click(function () {
                        $(this).parent().find('.elem-nav-cat-active').removeClass('elem-nav-cat-active');
                        $(this).addClass('elem-nav-cat-active');
                    });
            
            
                    $('#cat-sdelka .elem-nav-cat').click(function () {
                       var type = $('#category .elem-nav-cat-active').attr('data-type');
                        var deal = $(this).text();
                        var site_address = \"rieltor\";
                        $('#kvart-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#kvart-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дом&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дача&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Коттедж&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Таунхаус&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Гостиничного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коридорного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Секционного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коммунальная&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
            
                    });
            
            
            });// End ready
        ";

       switch ($type) {
           case "filter":
               if ($static) {
                   $this->content = "
                        $(document).ready(function() {
                            $( \"#slider-range-floor\" ).slider({
                                range: true,
                                min: 1,
                                max: 31,
                                values: [ 1, 31 ],
                                slide: function( event, ui ) {
                    
                                    var lastVar1 = ui.values[0];
                                    var lastVar2 = ui.values[1];
                                    $(\"#amount-floor_min\").val(lastVar1);
                                    $(\"#amount-floor_max\").val(lastVar2);
                                    if (lastVar1 == 31) {
                                        lastVar1 = \"31+\";
                                    }
                                    if (lastVar2 == 31) {
                                        lastVar2 = \"31+\";
                                    }
                                    var resultat = \"\";
                                    if (lastVar1 == lastVar2) {
                                        resultat = lastVar2 + \" этаж\";
                                    } else if ((lastVar1 == 1) && (lastVar2 == \"31+\")) {
                                        resultat = \"Этаж\";
                                    } else {
                                        resultat = lastVar1 + \" - \" + lastVar2 + \" этаж\";
                                    }
                                    $(\"#amount-floor\").val(resultat);
                                    $(\"#slider-range-floor .ui-slider-handle\").first().text(lastVar1);
                                    $(\"#slider-range-floor .ui-slider-handle\").last().text(lastVar2);
                                }
                            });
                            var lastVar1_1 = $( \"#slider-range-floor\" ).slider( \"values\", 0 );
                            var lastVar2_1 = $( \"#slider-range-floor\" ).slider( \"values\", 1 );
                            $( \"#amount-floor_min\" ).val(lastVar1_1);
                            $( \"#amount-floor_max\" ).val(lastVar2_1);
                    
                            if (lastVar1_1 == 31) {
                                lastVar1_1 = \"31+\";
                            }
                            if (lastVar2_1 == 31) {
                                lastVar2_1 = \"31+\";
                            }
                            var resultat2 = \"\";
                            if (lastVar1_1 == lastVar2_1) {
                                resultat2 = lastVar2_1 + \" этаж\";
                            } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"31+\")) {
                                resultat2 = \"Этаж\";
                            } else {
                                resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этаж\";
                            }
                            $( \"#amount-floor\" ).val(resultat2);
                            $(\"#slider-range-floor .ui-slider-handle\").first().text(lastVar1_1);
                            $(\"#slider-range-floor .ui-slider-handle\").last().text(lastVar2_1);
                    
                            $( \"#slider-range-floorInObj_1\" ).slider({
                                range: true,
                                min: 1,
                                max: 31,
                                values: [ 1, 31 ],
                                slide: function( event, ui ) {
                                    var lastVar1 = ui.values[0];
                                    var lastVar2 = ui.values[1];
                                    $(\"#amount-floorInObj_1_min\").val(lastVar1);
                                    $(\"#amount-floorInObj_1_max\").val(lastVar2);
                                    if (lastVar1 == 31) {
                                        lastVar1 = \"31+\";
                                    }
                                    if (lastVar2 == 31) {
                                        lastVar2 = \"31+\";
                                    }
                                    var resultat = \"\";
                                    if (lastVar1 == lastVar2) {
                                        resultat = lastVar2 + \" этажей\";
                                    } else if ((lastVar1 == 1) && (lastVar2 == \"31+\")) {
                                        resultat = \"Этажей в доме\";
                                    } else {
                                        resultat = lastVar1 + \" - \" + lastVar2 + \" этажей\";
                                    }
                                    $(\"#amount-floorInObj_1\").val(resultat);
                                    $(\"#slider-range-floorInObj_1 .ui-slider-handle\").first().text(lastVar1);
                                    $(\"#slider-range-floorInObj_1 .ui-slider-handle\").last().text(lastVar2);
                                }
                            });
                            var lastVar1_1 = $( \"#slider-range-floorInObj_1\" ).slider( \"values\", 0 );
                            var lastVar2_1 = $( \"#slider-range-floorInObj_1\" ).slider( \"values\", 1 );
                            $( \"#amount-floorInObj_1_min\" ).val(lastVar1_1);
                            $( \"#amount-floorInObj_1_max\" ).val(lastVar2_1);
                    
                            if (lastVar1_1 == 31) {
                                lastVar1_1 = \"31+\";
                            }
                            if (lastVar2_1 == 31) {
                                lastVar2_1 = \"31+\";
                            }
                            var resultat2 = \"\";
                            if (lastVar1_1 == lastVar2_1) {
                                resultat2 = lastVar2_1 + \" этажей\";
                            } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"31+\")) {
                                resultat2 = \"Этажей в доме\";
                            } else {
                                resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этажей\";
                            }
                            $( \"#amount-floorInObj_1\" ).val(resultat2);
                            $(\"#slider-range-floorInObj_1 .ui-slider-handle\").first().text(lastVar1_1);
                            $(\"#slider-range-floorInObj_1 .ui-slider-handle\").last().text(lastVar2_1);
                    
                    
                            $( \"#slider-range-floorInObj_2\" ).slider({
                                range: true,
                                min: 1,
                                max: 5,
                                values: [ 1, 5 ],
                                slide: function( event, ui ) {
                                    var lastVar1 = ui.values[0];
                                    var lastVar2 = ui.values[1];
                                    $(\"#amount-floorInObj_2_min\").val(lastVar1);
                                    $(\"#amount-floorInObj_2_max\").val(lastVar2);
                                    if (lastVar1 == 5) {
                                        lastVar1 = \"5+\";
                                    }
                                    if (lastVar2 == 5) {
                                        lastVar2 = \"5+\";
                                    }
                                    var resultat = \"\";
                                    if (lastVar1 == lastVar2) {
                                        resultat = lastVar2 + \" этажей\";
                                    } else if ((lastVar1 == 1) && (lastVar2 == \"5+\")) {
                                        resultat = \"Этажей в доме\";
                                    } else {
                                        resultat = lastVar1 + \" - \" + lastVar2 + \" этажей\";
                                    }
                                    $(\"#amount-floorInObj_2\").val(resultat);
                                    $(\"#slider-range-floorInObj_2 .ui-slider-handle\").first().text(lastVar1);
                                    $(\"#slider-range-floorInObj_2 .ui-slider-handle\").last().text(lastVar2);
                                }
                            });
                            var lastVar1_1 = $( \"#slider-range-floorInObj_2\" ).slider( \"values\", 0 );
                            var lastVar2_1 = $( \"#slider-range-floorInObj_2\" ).slider( \"values\", 1 );
                            $( \"#amount-floorInObj_2_min\" ).val(lastVar1_1);
                            $( \"#amount-floorInObj_2_max\" ).val(lastVar2_1);
                    
                            if (lastVar1_1 == 5) {
                                lastVar1_1 = \"5+\";
                            }
                            if (lastVar2_1 == 5) {
                                lastVar2_1 = \"5+\";
                            }
                            var resultat2 = \"\";
                            if (lastVar1_1 == lastVar2_1) {
                                resultat2 = lastVar2_1 + \" этажей\";
                            } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"5+\")) {
                                resultat2 = \"Этажей в доме\";
                            } else {
                                resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этажей\";
                            }
                            $( \"#amount-floorInObj_2\" ).val(resultat2);
                            $(\"#slider-range-floorInObj_2 .ui-slider-handle\").first().text(lastVar1_1);
                            $(\"#slider-range-floorInObj_2 .ui-slider-handle\").last().text(lastVar2_1);
                    
                            $( \"#slider-range-square_1\" ).slider({
                                range: true,
                                min: 10,
                                max: 200,
                                values: [ 10, 200 ],
                                slide: function( event, ui ) {
                                    var lastVar1 = ui.values[ 0 ];
                                    var lastVar2 = ui.values[ 1 ];
                                    $( \"#amount-square_min\" ).val(lastVar1);
                                    $( \"#amount-square_max\" ).val(lastVar2);
                                    if (lastVar1 == 200) {
                                        lastVar1 = \"200+\";
                                    }
                                    if (lastVar2 == 200) {
                                        lastVar2 = \"200+\";
                                    }
                                    var resultat = \"\";
                                    if (lastVar1 == lastVar2) {
                                        resultat = lastVar2 + \" м²\";
                                    } else if ( (lastVar1 == 10) && (lastVar2 == \"200+\")) {
                                        resultat = \"Площадь, м²\";
                                    } else {
                                        resultat = lastVar1 + \" - \" + lastVar2 + \" м²\";
                                    }
                                    $( \"#amount-square_1\" ).val(resultat);
                                    $(\"#slider-range-square_1 .ui-slider-handle\").first().text(lastVar1);
                                    $(\"#slider-range-square_1 .ui-slider-handle\").last().text(lastVar2);
                                }
                            });
                            var lastVar1_1 = $( \"#slider-range-square_1\" ).slider( \"values\", 0 );
                            var lastVar2_1 = $( \"#slider-range-square_1\" ).slider( \"values\", 1 );
                            $( \"#amount-square_min\" ).val(lastVar1_1);
                            $( \"#amount-square_max\" ).val(lastVar2_1);
                            if (lastVar1_1 == 200) {
                                lastVar1_1 = \"200+\";
                            }
                            if (lastVar2_1 == 200) {
                                lastVar2_1 = \"200+\";
                            }
                            var resultat2 = \"\";
                            if (lastVar1_1 == lastVar2_1) {
                                resultat2 = lastVar2_1 + \" м²\";
                            } else if ((lastVar1_1 == 10) && (lastVar2_1 == \"200+\")) {
                                resultat2 = \"Площадь, м²\";
                            } else {
                                resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" м²\";
                            }
                            $( \"#amount-square_1\" ).val(resultat2);
                            $(\"#slider-range-square_1 .ui-slider-handle\").first().text(lastVar1_1);
                            $(\"#slider-range-square_1 .ui-slider-handle\").last().text(lastVar2_1);
                    
                            $( \"#slider-range-square_2\" ).slider({
                                range: true,
                                min: 10,
                                max: 500,
                                values: [ 10, 500 ],
                                slide: function( event, ui ) {
                                    var lastVar1 = ui.values[ 0 ];
                                    var lastVar2 = ui.values[ 1 ];
                                    $( \"#amount-square_2_min\" ).val(lastVar1);
                                    $( \"#amount-square_2_max\" ).val(lastVar2);
                                    if (lastVar1 == 500) {
                                        lastVar1 = \"500+\";
                                    }
                                    if (lastVar2 == 500) {
                                        lastVar2 = \"500+\";
                                    }
                                    var resultat = \"\";
                                    if (lastVar1 == lastVar2) {
                                        resultat = lastVar2 + \" м²\";
                                    } else if ( (lastVar1 == 10) && (lastVar2 == \"500+\")) {
                                        resultat = \"Площадь дома, м²\";
                                    } else {
                                        resultat = lastVar1 + \" - \" + lastVar2 + \" м²\";
                                    }
                                    $( \"#amount-square_2\" ).val(resultat);
                                    $(\"#slider-range-square_2 .ui-slider-handle\").first().text(lastVar1);
                                    $(\"#slider-range-square_2 .ui-slider-handle\").last().text(lastVar2);
                                }
                            });
                            var lastVar1_1 = $( \"#slider-range-square_2\" ).slider( \"values\", 0 );
                            var lastVar2_1 = $( \"#slider-range-square_2\" ).slider( \"values\", 1 );
                            $( \"#amount-square_2_min\" ).val(lastVar1_1);
                            $( \"#amount-square_2_max\" ).val(lastVar2_1);
                            if (lastVar1_1 == 500) {
                                lastVar1_1 = \"500+\";
                            }
                            if (lastVar2_1 == 500) {
                                lastVar2_1 = \"500+\";
                            }
                            var resultat2 = \"\";
                            if (lastVar1_1 == lastVar2_1) {
                                resultat2 = lastVar2_1 + \" м²\";
                            } else if ((lastVar1_1 == 10) && (lastVar2_1 == \"500+\")) {
                                resultat2 = \"Площадь дома, м²\";
                            } else {
                                resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" м²\";
                            }
                            $( \"#amount-square_2\" ).val(resultat2);
                            $(\"#slider-range-square_2 .ui-slider-handle\").first().text(lastVar1_1);
                            $(\"#slider-range-square_2 .ui-slider-handle\").last().text(lastVar2_1);
                    
                            $( \"#slider-range-square_earth\" ).slider({
                                range: true,
                                min: 1,
                                max: 100,
                                values: [ 1, 100 ],
                                slide: function( event, ui ) {
                                    var lastVar1 = ui.values[ 0 ];
                                    var lastVar2 = ui.values[ 1 ];
                                    $( \"#amount-square_earth_min\" ).val(lastVar1);
                                    $( \"#amount-square_earth_max\" ).val(lastVar2);
                                    if (lastVar1 == 100) {
                                        lastVar1 = \"100+\";
                                    }
                                    if (lastVar2 == 100) {
                                        lastVar2 = \"100+\";
                                    }
                                    var resultat = \"\";
                                    if (lastVar1 == lastVar2) {
                                        resultat = lastVar2 + \" сот.\";
                                    } else if ( (lastVar1 == 1) && (lastVar2 == \"100+\")) {
                                        resultat = \"Площадь участка, сот.\";
                                    } else {
                                        resultat = lastVar1 + \" - \" + lastVar2 + \" сот.\";
                                    }
                                    $( \"#amount-square_earth\" ).val(resultat);
                                    $(\"#slider-range-square_earth .ui-slider-handle\").first().text(lastVar1);
                                    $(\"#slider-range-square_earth .ui-slider-handle\").last().text(lastVar2);
                                }
                            });
                            var lastVar1_1 = $( \"#slider-range-square_earth\" ).slider( \"values\", 0 );
                            var lastVar2_1 = $( \"#slider-range-square_earth\" ).slider( \"values\", 1 );
                            $( \"#amount-square_earth_min\" ).val(lastVar1_1);
                            $( \"#amount-square_earth_max\" ).val(lastVar2_1);
                            if (lastVar1_1 == 100) {
                                lastVar1_1 = \"100+\";
                            }
                            if (lastVar2_1 == 100) {
                                lastVar2_1 = \"100+\";
                            }
                            var resultat2 = \"\";
                            if (lastVar1_1 == lastVar2_1) {
                                resultat2 = lastVar2_1 + \" сот.\";
                            } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"100+\")) {
                                resultat2 = \"Площадь участка, сот.\";
                            } else {
                                resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" сот.\";
                            }
                            $( \"#amount-square_earth\" ).val(resultat2);
                            $(\"#slider-range-square_earth .ui-slider-handle\").first().text(lastVar1_1);
                            $(\"#slider-range-square_earth .ui-slider-handle\").last().text(lastVar2_1);
                    
                            $( \"#slider-range-distance\" ).slider({
                                range: true,
                                min: 0,
                                max: 100,
                                values: [ 0, 100 ],
                                slide: function( event, ui ) {
                                    var lastVar1 = ui.values[ 0 ];
                                    var lastVar2 = ui.values[ 1 ];
                                    $( \"#amount-distance_min\" ).val(lastVar1);
                                    $( \"#amount-distance_max\" ).val(lastVar2);
                                    if (lastVar1 == 100) {
                                        lastVar1 = \"100+\";
                                    }
                                    if (lastVar2 == 100) {
                                        lastVar2 = \"100+\";
                                    }
                                    if (lastVar1 == 0 && lastVar2 == 0) {
                                        lastVar1 = \"В черте города\";
                                    }
                                    var resultat = \"\";
                                    if (lastVar1 == lastVar2) {
                                        resultat = lastVar2 + \" км.\";
                                    } else if ( (lastVar1 == 0) && (lastVar2 == \"100+\")) {
                                        resultat = \"Расстояние до города, км.\";
                                    } else if (lastVar1 == \"В черте города\") {
                                        resultat = \"В черте города\";
                                        lastVar1 = 0;
                                    } else {
                                        resultat = lastVar1 + \" - \" + lastVar2 + \" км.\";
                                    }
                                    $( \"#amount-distance\" ).val(resultat);
                                    $(\"#slider-range-distance .ui-slider-handle\").first().text(lastVar1);
                                    $(\"#slider-range-distance .ui-slider-handle\").last().text(lastVar2);
                                }
                            });
                            var lastVar1_1 = $( \"#slider-range-distance\" ).slider( \"values\", 0 );
                            var lastVar2_1 = $( \"#slider-range-distance\" ).slider( \"values\", 1 );
                            $( \"#amount-distance_min\" ).val(lastVar1_1);
                            $( \"#amount-distance_max\" ).val(lastVar2_1);
                            if (lastVar1_1 == 100) {
                                lastVar1_1 = \"100+\";
                            }
                            if (lastVar2_1 == 100) {
                                lastVar2_1 = \"100+\";
                            }
                            if (lastVar1_1 == 0 && lastVar2_1 == 0) {
                                lastVar1_1 = \"В черте города\";
                            }
                            var resultat2 = \"\";
                            if (lastVar1_1 == lastVar2_1) {
                                resultat2 = lastVar2_1 + \" км.\";
                            } else if ((lastVar1_1 == 0) && (lastVar2_1 == \"100+\")) {
                                resultat2 = \"Расстояние до города, км.\";
                            } else if (lastVar1_1 == \"В черте города\") {
                                resultat2 = \"В черте города\";
                                lastVar1_1 = 0;
                            } else {
                                resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" км.\";
                            }
                            $( \"#amount-distance\" ).val(resultat2);
                            $(\"#slider-range-distance .ui-slider-handle\").first().text(lastVar1_1);
                            $(\"#slider-range-distance .ui-slider-handle\").last().text(lastVar2_1);
                    
                            $( function() {
                                $( \"#rooms_search :checkbox\" ).checkboxradio({
                                    icon: false
                                });
                            });
                            $this->script_js
                        });";
               } else {
                 $floor_min = $request->input("floor_min");
                 $floor_max = $request->input("floor_max");
                 $floorInObj_2_min = $request->input("floorInObj_2_min");
                 $floorInObj_2_max = $request->input("floorInObj_2_max");
                 $floorInObj_1_min = $request->input("floorInObj_1_min");
                 $floorInObj_1_max = $request->input("floorInObj_1_max");
                 $square_1_min = $request->input("square_1_min");
                 $square_1_max = $request->input("square_1_max");
                 $square_2_min = $request->input("square_2_min");
                 $square_2_max = $request->input("square_2_max");
                 $square_earth_min = $request->input("square_earth_min");
                 $square_earth_max = $request->input("square_earth_max");
                 $distance_min = $request->input("distance_min");
                 $distance_max = $request->input("distance_max");
                 $this->content = "
                    $(document).ready(function() {
                        $( \"#slider-range-floor\" ).slider({
                            range: true,
                            min: 1,
                            max: 31,
                            values: [ $floor_min, $floor_max ],
                            slide: function( event, ui ) {                
                                var lastVar1 = ui.values[0];
                                var lastVar2 = ui.values[1];
                                $(\"#amount-floor_min\").val(lastVar1);
                                $(\"#amount-floor_max\").val(lastVar2);
                                if (lastVar1 == 31) {
                                    lastVar1 = \"31+\";
                                }
                                if (lastVar2 == 31) {
                                    lastVar2 = \"31+\";
                                }
                                var resultat = \"\";
                                if (lastVar1 == lastVar2) {
                                    resultat = lastVar2 + \" этаж\";
                                } else if ((lastVar1 == 1) && (lastVar2 == \"31+\")) {
                                    resultat = \"Этаж\";
                                } else {
                                    resultat = lastVar1 + \" - \" + lastVar2 + \" этаж\";
                                }
                                $(\"#amount-floor\").val(resultat);
                                $(\"#slider-range-floor .ui-slider-handle\").first().text(lastVar1);
                                $(\"#slider-range-floor .ui-slider-handle\").last().text(lastVar2);
                            }
                        });
                        var lastVar1_1 = $( \"#slider-range-floor\" ).slider( \"values\", 0 );
                        var lastVar2_1 = $( \"#slider-range-floor\" ).slider( \"values\", 1 );
                        $( \"#amount-floor_min\" ).val(lastVar1_1);
                        $( \"#amount-floor_max\" ).val(lastVar2_1);
                
                        if (lastVar1_1 == 31) {
                            lastVar1_1 = \"31+\";
                        }
                        if (lastVar2_1 == 31) {
                            lastVar2_1 = \"31+\";
                        }
                        var resultat2 = \"\";
                        if (lastVar1_1 == lastVar2_1) {
                            resultat2 = lastVar2_1 + \" этаж\";
                        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"31+\")) {
                            resultat2 = \"Этаж\";
                        } else {
                            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этаж\";
                        }
                        $( \"#amount-floor\" ).val(resultat2);
                        $(\"#slider-range-floor .ui-slider-handle\").first().text(lastVar1_1);
                        $(\"#slider-range-floor .ui-slider-handle\").last().text(lastVar2_1);
                
                        $( \"#slider-range-floorInObj_1\" ).slider({
                            range: true,
                            min: 1,
                            max: 31,
                            values: [ $floorInObj_1_min, $floorInObj_1_max ],
                            slide: function( event, ui ) {
                                var lastVar1 = ui.values[0];
                                var lastVar2 = ui.values[1];
                                $(\"#amount-floorInObj_1_min\").val(lastVar1);
                                $(\"#amount-floorInObj_1_max\").val(lastVar2);
                                if (lastVar1 == 31) {
                                    lastVar1 = \"31+\";
                                }
                                if (lastVar2 == 31) {
                                    lastVar2 = \"31+\";
                                }
                                var resultat = \"\";
                                if (lastVar1 == lastVar2) {
                                    resultat = lastVar2 + \" этажей\";
                                } else if ((lastVar1 == 1) && (lastVar2 == \"31+\")) {
                                    resultat = \"Этажей в доме\";
                                } else {
                                    resultat = lastVar1 + \" - \" + lastVar2 + \" этажей\";
                                }
                                $(\"#amount-floorInObj_1\").val(resultat);
                                $(\"#slider-range-floorInObj_1 .ui-slider-handle\").first().text(lastVar1);
                                $(\"#slider-range-floorInObj_1 .ui-slider-handle\").last().text(lastVar2);
                            }
                        });
                        var lastVar1_1 = $( \"#slider-range-floorInObj_1\" ).slider( \"values\", 0 );
                        var lastVar2_1 = $( \"#slider-range-floorInObj_1\" ).slider( \"values\", 1 );
                        $( \"#amount-floorInObj_1_min\" ).val(lastVar1_1);
                        $( \"#amount-floorInObj_1_max\" ).val(lastVar2_1);
                
                        if (lastVar1_1 == 31) {
                            lastVar1_1 = \"31+\";
                        }
                        if (lastVar2_1 == 31) {
                            lastVar2_1 = \"31+\";
                        }
                        var resultat2 = \"\";
                        if (lastVar1_1 == lastVar2_1) {
                            resultat2 = lastVar2_1 + \" этажей\";
                        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"31+\")) {
                            resultat2 = \"Этажей в доме\";
                        } else {
                            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этажей\";
                        }
                        $( \"#amount-floorInObj_1\" ).val(resultat2);
                        $(\"#slider-range-floorInObj_1 .ui-slider-handle\").first().text(lastVar1_1);
                        $(\"#slider-range-floorInObj_1 .ui-slider-handle\").last().text(lastVar2_1);
                
                
                        $( \"#slider-range-floorInObj_2\" ).slider({
                            range: true,
                            min: 1,
                            max: 5,
                            values: [ $floorInObj_2_min, $floorInObj_2_max ],
                            slide: function( event, ui ) {
                                var lastVar1 = ui.values[0];
                                var lastVar2 = ui.values[1];
                                $(\"#amount-floorInObj_2_min\").val(lastVar1);
                                $(\"#amount-floorInObj_2_max\").val(lastVar2);
                                if (lastVar1 == 5) {
                                    lastVar1 = \"5+\";
                                }
                                if (lastVar2 == 5) {
                                    lastVar2 = \"5+\";
                                }
                                var resultat = \"\";
                                if (lastVar1 == lastVar2) {
                                    resultat = lastVar2 + \" этажей\";
                                } else if ((lastVar1 == 1) && (lastVar2 == \"5+\")) {
                                    resultat = \"Этажей в доме\";
                                } else {
                                    resultat = lastVar1 + \" - \" + lastVar2 + \" этажей\";
                                }
                                $(\"#amount-floorInObj_2\").val(resultat);
                                $(\"#slider-range-floorInObj_2 .ui-slider-handle\").first().text(lastVar1);
                                $(\"#slider-range-floorInObj_2 .ui-slider-handle\").last().text(lastVar2);
                            }
                        });
                        var lastVar1_1 = $( \"#slider-range-floorInObj_2\" ).slider( \"values\", 0 );
                        var lastVar2_1 = $( \"#slider-range-floorInObj_2\" ).slider( \"values\", 1 );
                        $( \"#amount-floorInObj_2_min\" ).val(lastVar1_1);
                        $( \"#amount-floorInObj_2_max\" ).val(lastVar2_1);
                
                        if (lastVar1_1 == 5) {
                            lastVar1_1 = \"5+\";
                        }
                        if (lastVar2_1 == 5) {
                            lastVar2_1 = \"5+\";
                        }
                        var resultat2 = \"\";
                        if (lastVar1_1 == lastVar2_1) {
                            resultat2 = lastVar2_1 + \" этажей\";
                        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"5+\")) {
                            resultat2 = \"Этажей в доме\";
                        } else {
                            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этажей\";
                        }
                        $( \"#amount-floorInObj_2\" ).val(resultat2);
                        $(\"#slider-range-floorInObj_2 .ui-slider-handle\").first().text(lastVar1_1);
                        $(\"#slider-range-floorInObj_2 .ui-slider-handle\").last().text(lastVar2_1);
                
                        $( \"#slider-range-square_1\" ).slider({
                            range: true,
                            min: 10,
                            max: 200,
                            values: [ $square_1_min, $square_1_max ],
                            slide: function( event, ui ) {
                                var lastVar1 = ui.values[ 0 ];
                                var lastVar2 = ui.values[ 1 ];
                                $( \"#amount-square_min\" ).val(lastVar1);
                                $( \"#amount-square_max\" ).val(lastVar2);
                                if (lastVar1 == 200) {
                                    lastVar1 = \"200+\";
                                }
                                if (lastVar2 == 200) {
                                    lastVar2 = \"200+\";
                                }
                                var resultat = \"\";
                                if (lastVar1 == lastVar2) {
                                    resultat = lastVar2 + \" м²\";
                                } else if ( (lastVar1 == 10) && (lastVar2 == \"200+\")) {
                                    resultat = \"Площадь, м²\";
                                } else {
                                    resultat = lastVar1 + \" - \" + lastVar2 + \" м²\";
                                }
                                $( \"#amount-square_1\" ).val(resultat);
                                $(\"#slider-range-square_1 .ui-slider-handle\").first().text(lastVar1);
                                $(\"#slider-range-square_1 .ui-slider-handle\").last().text(lastVar2);
                            }
                        });
                        var lastVar1_1 = $( \"#slider-range-square_1\" ).slider( \"values\", 0 );
                        var lastVar2_1 = $( \"#slider-range-square_1\" ).slider( \"values\", 1 );
                        $( \"#amount-square_min\" ).val(lastVar1_1);
                        $( \"#amount-square_max\" ).val(lastVar2_1);
                        if (lastVar1_1 == 200) {
                            lastVar1_1 = \"200+\";
                        }
                        if (lastVar2_1 == 200) {
                            lastVar2_1 = \"200+\";
                        }
                        var resultat2 = \"\";
                        if (lastVar1_1 == lastVar2_1) {
                            resultat2 = lastVar2_1 + \" м²\";
                        } else if ((lastVar1_1 == 10) && (lastVar2_1 == \"200+\")) {
                            resultat2 = \"Площадь, м²\";
                        } else {
                            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" м²\";
                        }
                        $( \"#amount-square_1\" ).val(resultat2);
                        $(\"#slider-range-square_1 .ui-slider-handle\").first().text(lastVar1_1);
                        $(\"#slider-range-square_1 .ui-slider-handle\").last().text(lastVar2_1);
                
                        $( \"#slider-range-square_2\" ).slider({
                            range: true,
                            min: 10,
                            max: 500,
                            values: [ $square_2_min, $square_2_max ],
                            slide: function( event, ui ) {
                                var lastVar1 = ui.values[ 0 ];
                                var lastVar2 = ui.values[ 1 ];
                                $( \"#amount-square_2_min\" ).val(lastVar1);
                                $( \"#amount-square_2_max\" ).val(lastVar2);
                                if (lastVar1 == 500) {
                                    lastVar1 = \"500+\";
                                }
                                if (lastVar2 == 500) {
                                    lastVar2 = \"500+\";
                                }
                                var resultat = \"\";
                                if (lastVar1 == lastVar2) {
                                    resultat = lastVar2 + \" м²\";
                                } else if ( (lastVar1 == 10) && (lastVar2 == \"500+\")) {
                                    resultat = \"Площадь дома, м²\";
                                } else {
                                    resultat = lastVar1 + \" - \" + lastVar2 + \" м²\";
                                }
                                $( \"#amount-square_2\" ).val(resultat);
                                $(\"#slider-range-square_2 .ui-slider-handle\").first().text(lastVar1);
                                $(\"#slider-range-square_2 .ui-slider-handle\").last().text(lastVar2);
                            }
                        });
                        var lastVar1_1 = $( \"#slider-range-square_2\" ).slider( \"values\", 0 );
                        var lastVar2_1 = $( \"#slider-range-square_2\" ).slider( \"values\", 1 );
                        $( \"#amount-square_2_min\" ).val(lastVar1_1);
                        $( \"#amount-square_2_max\" ).val(lastVar2_1);
                        if (lastVar1_1 == 500) {
                            lastVar1_1 = \"500+\";
                        }
                        if (lastVar2_1 == 500) {
                            lastVar2_1 = \"500+\";
                        }
                        var resultat2 = \"\";
                        if (lastVar1_1 == lastVar2_1) {
                            resultat2 = lastVar2_1 + \" м²\";
                        } else if ((lastVar1_1 == 10) && (lastVar2_1 == \"500+\")) {
                            resultat2 = \"Площадь дома, м²\";
                        } else {
                            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" м²\";
                        }
                        $( \"#amount-square_2\" ).val(resultat2);
                        $(\"#slider-range-square_2 .ui-slider-handle\").first().text(lastVar1_1);
                        $(\"#slider-range-square_2 .ui-slider-handle\").last().text(lastVar2_1);
                
                        $( \"#slider-range-square_earth\" ).slider({
                            range: true,
                            min: 1,
                            max: 100,
                            values: [ $square_earth_min, $square_earth_max ],
                            slide: function( event, ui ) {
                                var lastVar1 = ui.values[ 0 ];
                                var lastVar2 = ui.values[ 1 ];
                                $( \"#amount-square_earth_min\" ).val(lastVar1);
                                $( \"#amount-square_earth_max\" ).val(lastVar2);
                                if (lastVar1 == 100) {
                                    lastVar1 = \"100+\";
                                }
                                if (lastVar2 == 100) {
                                    lastVar2 = \"100+\";
                                }
                                var resultat = \"\";
                                if (lastVar1 == lastVar2) {
                                    resultat = lastVar2 + \" сот.\";
                                } else if ( (lastVar1 == 1) && (lastVar2 == \"100+\")) {
                                    resultat = \"Площадь участка, сот.\";
                                } else {
                                    resultat = lastVar1 + \" - \" + lastVar2 + \" сот.\";
                                }
                                $( \"#amount-square_earth\" ).val(resultat);
                                $(\"#slider-range-square_earth .ui-slider-handle\").first().text(lastVar1);
                                $(\"#slider-range-square_earth .ui-slider-handle\").last().text(lastVar2);
                            }
                        });
                        var lastVar1_1 = $( \"#slider-range-square_earth\" ).slider( \"values\", 0 );
                        var lastVar2_1 = $( \"#slider-range-square_earth\" ).slider( \"values\", 1 );
                        $( \"#amount-square_earth_min\" ).val(lastVar1_1);
                        $( \"#amount-square_earth_max\" ).val(lastVar2_1);
                        if (lastVar1_1 == 100) {
                            lastVar1_1 = \"100+\";
                        }
                        if (lastVar2_1 == 100) {
                            lastVar2_1 = \"100+\";
                        }
                        var resultat2 = \"\";
                        if (lastVar1_1 == lastVar2_1) {
                            resultat2 = lastVar2_1 + \" сот.\";
                        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"100+\")) {
                            resultat2 = \"Площадь участка, сот.\";
                        } else {
                            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" сот.\";
                        }
                        $( \"#amount-square_earth\" ).val(resultat2);
                        $(\"#slider-range-square_earth .ui-slider-handle\").first().text(lastVar1_1);
                        $(\"#slider-range-square_earth .ui-slider-handle\").last().text(lastVar2_1);
                
                        $( \"#slider-range-distance\" ).slider({
                            range: true,
                            min: 0,
                            max: 100,
                            values: [ $distance_min, $distance_max ],
                            slide: function( event, ui ) {
                                var lastVar1 = ui.values[ 0 ];
                                var lastVar2 = ui.values[ 1 ];
                                $( \"#amount-distance_min\" ).val(lastVar1);
                                $( \"#amount-distance_max\" ).val(lastVar2);
                                if (lastVar1 == 100) {
                                    lastVar1 = \"100+\";
                                }
                                if (lastVar2 == 100) {
                                    lastVar2 = \"100+\";
                                }
                                if (lastVar1 == 0 && lastVar2 == 0) {
                                    lastVar1 = \"В черте города\";
                                }
                                var resultat = \"\";
                                if (lastVar1 == lastVar2) {
                                    resultat = lastVar2 + \" км.\";
                                } else if ( (lastVar1 == 0) && (lastVar2 == \"100+\")) {
                                    resultat = \"Расстояние до города, км.\";
                                } else if (lastVar1 == \"В черте города\") {
                                    resultat = \"В черте города\";
                                    lastVar1 = 0;
                                } else {
                                    resultat = lastVar1 + \" - \" + lastVar2 + \" км.\";
                                }
                                $( \"#amount-distance\" ).val(resultat);
                                $(\"#slider-range-distance .ui-slider-handle\").first().text(lastVar1);
                                $(\"#slider-range-distance .ui-slider-handle\").last().text(lastVar2);
                            }
                        });
                        var lastVar1_1 = $( \"#slider-range-distance\" ).slider( \"values\", 0 );
                        var lastVar2_1 = $( \"#slider-range-distance\" ).slider( \"values\", 1 );
                        $( \"#amount-distance_min\" ).val(lastVar1_1);
                        $( \"#amount-distance_max\" ).val(lastVar2_1);
                        if (lastVar1_1 == 100) {
                            lastVar1_1 = \"100+\";
                        }
                        if (lastVar2_1 == 100) {
                            lastVar2_1 = \"100+\";
                        }
                        if (lastVar1_1 == 0 && lastVar2_1 == 0) {
                            lastVar1_1 = \"В черте города\";
                        }
                        var resultat2 = \"\";
                        if (lastVar1_1 == lastVar2_1) {
                            resultat2 = lastVar2_1 + \" км.\";
                        } else if ((lastVar1_1 == 0) && (lastVar2_1 == \"100+\")) {
                            resultat2 = \"Расстояние до города, км.\";
                        } else if (lastVar1_1 == \"В черте города\") {
                            resultat2 = \"В черте города\";
                            lastVar1_1 = 0;
                        } else {
                            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" км.\";
                        }
                        $( \"#amount-distance\" ).val(resultat2);
                        $(\"#slider-range-distance .ui-slider-handle\").first().text(lastVar1_1);
                        $(\"#slider-range-distance .ui-slider-handle\").last().text(lastVar2_1);
                        $( function() {
                            $( \"#rooms_search :checkbox\" ).checkboxradio({
                                icon: false
                            });
                        });
                            var myChoise = $ ('#city :selected').val();
                            if (myChoise == 1) {
                                $('#adr').css('width', '25%');
                                $('#amount-area_1').show();
                                $('#amount-area_2').hide();
                            } else if (myChoise == 2) {
                                $('#adr').css('width', '25%');
                                $('#amount-area_1').hide();
                                $('#amount-area_2').show();
                            } else {
                                $('#adr').css('width', '45%');
                                $('#amount-area_1').hide();
                                $('#amount-area_2').hide();
                            }                

                            var myChoise = $ ('#type :selected').val();
                            if (myChoise == 2) {
                                $('#formObj_3').hide();
                                $('#amount-floor').hide();
                                $('#amount-typeHouse_1').hide();
                                $('#amount-floorInObj_1').hide();
                                $('#formObj_1').hide();
                                $('#typeHouse_1').hide();
                                $('#amount-rooms').hide();
                                $('#amount-formObj_2').show();
                                $('#amount-typeHouse_2').show();
                                $('#amount-square_earth').show();
                                $('#amount-floorInObj_2').show();
                                $('#typeHouse_2').show();
                                $('#amount-square_2').show();
                                $('#amount-distance').show();
                                $('#amount-square_1').hide();
                            } else if (myChoise == 3){
                                $('#amount-typeHouse_2').hide();
                                $('#amount-floorInObj_1').show();
                                $('#formObj_3').show();
                                $('#amount-floor').show();
                                $('#amount-typeHouse_1').show();
                                $('#formObj_1').hide();
                                $('#typeHouse_1').show();
                                $('#amount-rooms').show();
                                $('#amount-formObj_2').hide();
                                $('#amount-square_earth').hide();
                                $('#amount-floorInObj_2').hide();
                                $('#typeHouse_2').hide();
                                $('#amount-square_2').hide();
                                $('#amount-distance').hide();
                                $('#amount-square_1').show();
                            } else {
                                $('#amount-typeHouse_2').hide();
                                $('#amount-typeHouse_1').show();
                                $('#formObj_3').hide();
                                $('#amount-floor').show();
                                $('#amount-floorInObj_1').show();
                                $('#formObj_1').show();
                                $('#typeHouse_1').show();
                                $('#amount-rooms').show();
                                $('#amount-formObj_2').hide();
                                $('#amount-square_earth').hide();
                                $('#amount-floorInObj_2').hide();
                                $('#typeHouse_2').hide();
                                $('#amount-square_2').hide();
                                $('#amount-distance').hide();
                                $('#amount-square_1').show();
                            }                                     
                                        
                        $this->script_js
                    });
                 ";   
               }
               break;
           case "obj-view":
               if ($static) {
                   $this->content = "
                        $(document).ready(function() {
                            $('#imageGallery').lightSlider({
                                gallery:true,
                                item:1,
                                loop:true,
                                controls: false,
                                auto:true,
                                pauseOnHover: true,
                                vertical:true,
                                verticalHeight:550,
                                vThumbWidth:100,
                                thumbItem:8,
                                thumbMargin:4,
                                slideMargin:0,
                                currentPagerPosition:'left',
                                onSliderLoad: function(el) {
                                    el.lightGallery({
                                        selector: '#imageGallery .lslide'
                                    });
                                }
                            });
                            $('#cat-kvart, #cat-house, #cat-komn').click(function(){
                        var show = $('#cat-sdelka').show(0);
                        $('#menu-cat-3 .menu-block').each(function () {
                            var show = $(this).css(\"display\");
                            if (show == \"block\") {
                                $(this).hide(0);
                            }
                        });
                    });
                    $('#cat-sdelka .elem-nav-cat').click(function(){
                         var id_target = $('#category .elem-nav-cat-active').attr('data-show');
                        $('#menu-cat-3 .menu-block').each(function () {
                            if ($(this).attr('id') == id_target) {
                                $(this).show(0);
                            } else {
                                $(this).hide(0);
                            }
                        });
            88172        });
                
                    $('.elem-nav-cat').click(function () {
                        $(this).parent().find('.elem-nav-cat-active').removeClass('elem-nav-cat-active');
                        $(this).addClass('elem-nav-cat-active');
                    });
            
            
                    $('#cat-sdelka .elem-nav-cat').click(function () {
                       var type = $('#category .elem-nav-cat-active').attr('data-type');
                        var deal = $(this).text();
                        var site_address = \"rieltor\";
                        $('#kvart-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#kvart-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дом&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дача&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Коттедж&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Таунхаус&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Гостиничного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коридорного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Секционного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коммунальная&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
            
                    });         
                        });
                        ymaps.ready(function () {
                                var myMap = window.map = new ymaps.Map('YMapsID', {
                                        center: [$request->geo],
                                        zoom: 16,
                                        behaviors: ['default']
                    
                                            }),
                                                                        
                                         _point = new ymaps.Placemark([$request->geo], {
                                        balloonContentBody: \"$request->address\"                            
                                        });
                                        myMap.controls.add(
                                    new ymaps.control.ZoomControl()
                            );
                            myMap.controls.add('typeSelector')
                            myMap.geoObjects.add(_point);});
                   ";
               } else {
                   $this->content = "
                $(document).ready(function() {
                    $('#imageGallery').lightSlider({
                        gallery:true,
                        item:1,
                        loop:true,
                        controls: false,
                        auto:true,
                        pauseOnHover: true,
                        vertical:true,
                        verticalHeight:550,
                        vThumbWidth:100,
                        thumbItem:8,
                        thumbMargin:4,
                        slideMargin:0,
                        currentPagerPosition:'left',
                        onSliderLoad: function(el) {
                            el.lightGallery({
                                selector: '#imageGallery .lslide'
                            });
                        }
                    });
                        $('.slider4').bxSlider({
                            slideWidth: 360,
                            minSlides: 3,
                            maxSlides: 3,
                            moveSlides: 1,
                            slideMargin: 10,
                            pager: false
                        });
                                           $('#cat-kvart, #cat-house, #cat-komn').click(function(){
                        var show = $('#cat-sdelka').show(0);
                        $('#menu-cat-3 .menu-block').each(function () {
                            var show = $(this).css(\"display\");
                            if (show == \"block\") {
                                $(this).hide(0);
                            }
                        });
                    });
                    $('#cat-sdelka .elem-nav-cat').click(function(){
                         var id_target = $('#category .elem-nav-cat-active').attr('data-show');
                        $('#menu-cat-3 .menu-block').each(function () {
                            if ($(this).attr('id') == id_target) {
                                $(this).show(0);
                            } else {
                                $(this).hide(0);
                            }
                        });
            88172        });
                
                    $('.elem-nav-cat').click(function () {
                        $(this).parent().find('.elem-nav-cat-active').removeClass('elem-nav-cat-active');
                        $(this).addClass('elem-nav-cat-active');
                    });
            
            
                    $('#cat-sdelka .elem-nav-cat').click(function () {
                       var type = $('#category .elem-nav-cat-active').attr('data-type');
                        var deal = $(this).text();
                        var site_address = \"rieltor\";
                        $('#kvart-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#kvart-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дом&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дача&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Коттедж&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Таунхаус&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Гостиничного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коридорного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Секционного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коммунальная&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
            
                    });
                });
                ymaps.ready(function () {
                        var myMap = window.map = new ymaps.Map('YMapsID', {
                                center: [$request->geo],
                                zoom: 16,
                                behaviors: ['default']
            
                                    }),
                                                                
                                 _point = new ymaps.Placemark([$request->geo], {
                                balloonContentBody: \"$request->address\"                            
                                });
                                myMap.controls.add(
                            new ymaps.control.ZoomControl()
                    );
                    myMap.controls.add('typeSelector')
                    myMap.geoObjects.add(_point);});
                    ";
               }
               break;
           case "obj-create": $this->content = "
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
                            rules: {                               
                                obj_address: {
                                    required: true,
                                },
                            },
                            messages: {
                                obj_address: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_price: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_doplata: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_square: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_house_square: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_earth_square: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                client_phone: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                client_mail: {
                                email: \"Введите корректный Email\",
                                },
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
                                form.validate().settings.ignore = \":disabled,:hidden\";
                                return form.valid();
                            },                                                    
                            onFinished: function (event, currentIndex) {
                                form.submit();
                            },
                            labels: {
                                finish: \"Создать\",
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
                                var token = \"$token\";
                                $.ajax({
                                    type: 'POST',
                                    url: '".route('adminObjDelImg')."',
                                    data: \"file=\"+name+\"&obj_id=\"+id+\"&tmp_img=\"+tmp_img+\"&_token=\"+token,
                                    dataType: 'html'
                                });
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            }
                        };
                        $(function() {
                            $(\"#comforts-no-border\").multiPicker({
                                selector    : \"checkbox\",
                                cssOptions : {
                                size      :  \"large\"
                                }
                               });
                            });
                        $(document).ready(function ()
                        { $('#spec_offer').on(
                                'change',
                                function()
                                {
                                    var 
                                        active = 'hide',
                                        obj    = $('#spec_offer_input');
                                    if (  $('#spec_offer').is(\":checked\")  ) active = 'show';
                                    obj[ active ]();
                                }
                            );   
                            $('#obj_type') . change(function () {
                                var
                                myChoise = $ ('#obj_type :selected') . val();
                                if (myChoise == 2) {
                                    $('#obj_form_1') . hide();
                                    $('#room') . hide();
                                    $('#build_type_1') . hide();
                                    $('#floor') . hide();
                                    $('#home_floors_1') . hide();
                                    $('#square') . hide();
                                    $('#obj_form_3') . hide();
                                    $('#earth_square') . show();
                                    $('#distance') . show();
                                    $('#house_square') . show();
                                    $('#build_type_2') . show();
                                    $('#obj_form_2') . show();
                                    $('#home_floors_2') . show();
                                } else if (myChoise == 3) {
                                    $('#obj_form_3') . show();
                                    $('#obj_form_2') . hide();
                                    $('#obj_form_1') . hide();
                                    $('#room') . show();
                                    $('#build_type_1') . show();
                                    $('#floor') . show();
                                    $('#home_floors_1') . show();
                                    $('#square') . show();
                                    $('#earth_square') . hide();
                                    $('#distance') . hide();
                                    $('#house_square') . hide();
                                    $('#build_type_2') . hide();
                                    $('#home_floors_2') . hide();
                                } else {
                                    $('#obj_form_1') . show();
                                    $('#room') . show();
                                    $('#build_type_1') . show();
                                    $('#floor') . show();
                                    $('#home_floors_1') . show();
                                    $('#square') . show();
                                    $('#obj_form_3') . hide();
                                    $('#earth_square') . hide();
                                    $('#distance') . hide();
                                    $('#house_square') . hide();
                                    $('#build_type_2') . hide();
                                    $('#obj_form_2') . hide();
                                    $('#home_floors_2') . hide();
                                }
                            });
                        
                            $('#obj_city select') . change(function () {
                                var
                                myChoise = $(this) . val();
                                $('#obj_city select option') . each(function () {
                                    var
                                    myChoise2 = $(this) . val();
                                    if (myChoise2 == myChoise) {
                                        $('#obj_area' + myChoise) . show();
                                    } else {
                                        $('#obj_area' + myChoise2) . hide();
                                    }
                                });
                            });
                        
                            $('#price input') . keyup(function () {
                                var
                                price = $('#price input') . val(),
                                            square = $('#square input') . val();
                                        if ($('#obj_type :selected') . val() == '2') {
                                            square = $('#house_square input') . val();
                                        }
                                        if (square . length !== 0) {
                                            price = price . replace(/[^0 - 9]+/g,'');
                                            square = square . replace(/[^0 - 9]+/g,'');
                                            pricesquare = Math . round(price / square);
                                            pricesquare = (pricesquare + '');
                                            pricesquare = pricesquare . replace(/(\\d)(?=(\\d\\d\\d) + ([^\\d]|$))/g, '$1\\.');
                                            $('#price_square input') . attr('value', pricesquare);
                                        }
                                    });                        
                        });
                ";
               break;
           case "obj-edit": $this->content = "
                    $(function() {
                        var form = $(\"#objCreate\");
                        form.validate({                           
                            rules: {                               
                                obj_address: {
                                    required: true,
                                },
                            },
                            messages: {
                                obj_address: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_price: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_doplata: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_square: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_house_square: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                obj_earth_square: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                client_phone: {
                                required: \"Это поле обязательно для заполнения\",
                                },
                                client_mail: {
                                email: \"Введите корректный Email\",
                                },
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
                                form.validate().settings.ignore = \":disabled,:hidden\";
                                return form.valid();
                            },                                                    
                            onFinished: function (event, currentIndex) {
                                form.submit();
                            },
                            labels: {
                                finish: \"Сохранить\",
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
                                var token = \"$token\";
                                $.ajax({
                                    type: 'POST',
                                    url: '".route('adminObjDelImg')."',
                                    data: \"file=\"+name+\"&obj_id=\"+id+\"&_token=\"+token,
                                    dataType: 'html'
                                });
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            },
                            init: function () {
                                thisDropzone = this;                               
                                var id = $('#obj-id').val();
                                <!-- 4 -->
                                $.get('".route('adminObjGetImg')."',{ objid: id}).done( function (data) {
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
                                        //thisDropzone.emit(\"thumbnail\", mockFile, \"uploads / \"+item.name);
                    
                                        thisDropzone.createThumbnailFromUrl(mockFile, \"".asset(config('settings.theme'))."/uploads/images/".$request->id."/\" + item . name);

                                        thisDropzone . emit(\"complete\", mockFile);

                                        thisDropzone . files . push(mockFile);
                                        });
                                    });
                                }
                            };
    $(function () {
    $(\"#comforts-no-border\").multiPicker({
                                selector	: \"checkbox\",
                                prePopulate : ['".$this->getEditComforts($request)."'],
                                cssOptions : {
                                size    : \"large\"
                                }
                            });
                        });
    $(document) . ready(function () {
        $('#spec_offer').on(
                                'change',
                                function()
                                {
                                    var 
                                        active = 'hide',
                                        obj    = $('#spec_offer_input');
                                    if (  $('#spec_offer').is(\":checked\")  ) active = 'show';
                                    obj[ active ]();
                                }
                            );
        ".$this->getEditScript($request)."
        $('#obj_type').change(function () {
            var myChoise = $ ('#obj_type :selected').val();
            if (myChoise == 2) {
                $('#obj_form_1').hide();
                $('#room').hide();
                $('#build_type_1').hide();
                $('#floor').hide();
                $('#home_floors_1').hide();
                $('#square').hide();
                $('#obj_form_3').hide();
                $('#earth_square').show();
                $('#distance').show();
                $('#house_square').show();
                $('#build_type_2').show();
                $('#obj_form_2').show();
                $('#home_floors_2').show();
            } else if (myChoise == 3) {
                $('#obj_form_3').show();
                $('#obj_form_2').hide();
                $('#obj_form_1').hide();
                $('#room').show();
                $('#build_type_1').show();
                $('#floor').show();
                $('#home_floors_1').show();
                $('#square').show();
                $('#earth_square').hide();
                $('#distance').hide();
                $('#house_square').hide();
                $('#build_type_2').hide();
                $('#home_floors_2').hide();
            } else {
                $('#obj_form_1').show();
                $('#room').show();
                $('#build_type_1').show();
                $('#floor').show();
                $('#home_floors_1').show();
                $('#square').show();
                $('#obj_form_3').hide();
                $('#earth_square').hide();
                $('#distance').hide();
                $('#house_square').hide();
                $('#build_type_2').hide();
                $('#obj_form_2').hide();
                $('#home_floors_2').hide();
            }
        });
    
        $('#obj_city select').change(function () {
            var myChoise = $(this).val();
            $('#obj_city select option').each(function () {
                    var myChoise2 = $(this).val();
                    if (myChoise2 == myChoise) {
                        $('#obj_area'+myChoise).show();
                    } else {
                        $('#obj_area'+myChoise2).hide();
                    }
                });
            });
    
                $('#price input').keyup(function(){
                    var price = $('#price input').val(),
                        square = $('#square input').val();
                    if ( $('#obj_type :selected').val() == '2' ) {
                        square = $('#house_square input').val();
                    }
                    if ( square.length !== 0 ) {
                        price =  price.replace(/[^0-9]+/g,'');
                        square =  square.replace(/[^0-9]+/g,'');
                        pricesquare = Math.round(price/square);
                        pricesquare = (pricesquare + '');
                        pricesquare = pricesquare.replace(/(\\d)(?=(\\d\\d\\d)+([^\\d]|$))/g, '$1\\.');
                        $('#price_square input').attr('value', pricesquare);
                    }
                });
            });
                ";
               break;
           case "front":
               if ($static) {
               $this->content = "
                $(document).ready(function () {
                    $(function() {
                        $('#da-slider').cslider({
                            autoplay	: true,
                            bgincrement	: 450
                        });
                    });
                    
                    $('#cat-kvart, #cat-house, #cat-komn').click(function(){
                        var show = $('#cat-sdelka').show(0);
                        $('#menu-cat-3 .menu-block').each(function () {
                            var show = $(this).css(\"display\");
                            if (show == \"block\") {
                                $(this).hide(0);
                            }
                        });
                    });
                    $('#cat-sdelka .elem-nav-cat').click(function(){
                         var id_target = $('#category .elem-nav-cat-active').attr('data-show');
                        $('#menu-cat-3 .menu-block').each(function () {
                            if ($(this).attr('id') == id_target) {
                                $(this).show(0);
                            } else {
                                $(this).hide(0);
                            }
                        });
            88172        });
                
                    $('.elem-nav-cat').click(function () {
                        $(this).parent().find('.elem-nav-cat-active').removeClass('elem-nav-cat-active');
                        $(this).addClass('elem-nav-cat-active');
                    });
            
            
                    $('#cat-sdelka .elem-nav-cat').click(function () {
                       var type = $('#category .elem-nav-cat-active').attr('data-type');
                        var deal = $(this).text();
                        var site_address = \"rieltor\";
                        $('#kvart-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#kvart-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дом&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дача&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Коттедж&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Таунхаус&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Гостиничного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коридорного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Секционного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коммунальная&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
            
                    });
                    
                });";
               } else {
                   $this->content = "
                $(document).ready(function () {
                        $('#da-slider').cslider({
                            autoplay	: true,
                            bgincrement	: 450
                    });
                    $('.slider4').bxSlider({
                            slideWidth: 360,
                            minSlides: 3,
                            maxSlides: 3,
                            moveSlides: 1,
                            slideMargin: 10,
                            pager: false
                        });
                        
                     $('#cat-kvart, #cat-house, #cat-komn').click(function(){
                        var show = $('#cat-sdelka').show(0);
                        $('#menu-cat-3 .menu-block').each(function () {
                            var show = $(this).css(\"display\");
                            if (show == \"block\") {
                                $(this).hide(0);
                            }
                        });
                    });
                    $('#cat-sdelka .elem-nav-cat').click(function(){
                         var id_target = $('#category .elem-nav-cat-active').attr('data-show');
                        $('#menu-cat-3 .menu-block').each(function () {
                            if ($(this).attr('id') == id_target) {
                                $(this).show(0);
                            } else {
                                $(this).hide(0);
                            }
                        });
            88172        });
                
                    $('.elem-nav-cat').click(function () {
                        $(this).parent().find('.elem-nav-cat-active').removeClass('elem-nav-cat-active');
                        $(this).addClass('elem-nav-cat-active');
                    });
            
            
                    $('#cat-sdelka .elem-nav-cat').click(function () {
                       var type = $('#category .elem-nav-cat-active').attr('data-type');
                        var deal = $(this).text();
                        var site_address = \"rieltor\";
                        $('#kvart-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#kvart-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дом&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Дача&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Коттедж&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#house-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=&typeObj_2[]=Таунхаус&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-1').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Гостиничного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-2').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коридорного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-3').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Секционного&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
                        $('#comnt-2-4').attr(\"href\", \"catalog?category=\"+ type +\"&city=2&deal=\"+ deal +\"&address=&search=Найти&formObj_1=Вторичка&formObj_3=Коммунальная&square_2_min=10&square_2_max=500&square_1_min=10&square_1_max=200&square_earth_min=1&square_earth_max=100&floor_min=1&floor_max=31&floorInObj_2_min=1&floorInObj_2_max=5&floorInObj_1_min=1&floorInObj_1_max=31&distance_min=0&distance_max=100&price_min=&price_max=\")
            
                    });
                        
                });";

               }
               break;
           case "catalog-filter": if ($static) {
               $this->content = "
               $this->cat_script_js
               $(document).ready(function() {
               ".($specOffer ? $this->specOffer_js : "")."
        $( \"#cat_slider-range-floor\" ).slider({
                    range: true,
                    min: 1,
                    max: 31,
                values: [ 1, 31 ],
                slide: function( event, ui ) {

            var lastVar1 = ui.values[0];
            var lastVar2 = ui.values[1];
            $(\"#cat_amount-floor_min\").val(lastVar1);
            $(\"#cat_amount-floor_max\").val(lastVar2);
            if (lastVar1 == 31) {
                lastVar1 = \"31+\";
            }
            if (lastVar2 == 31) {
                lastVar2 = \"31+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" этаж\";
            } else if ((lastVar1 == 1) && (lastVar2 == \"31+\")) {
                resultat = \"Этаж\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" этаж\";
            }
            $(\"#cat_amount-floor\").val(resultat);
            $(\"#cat_slider-range-floor .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-floor .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-floor\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-floor\" ).slider( \"values\", 1 );
        $( \"#cat_amount-floor_min\" ).val(lastVar1_1);
        $( \"#cat_amount-floor_max\" ).val(lastVar2_1);

        if (lastVar1_1 == 31) {
            lastVar1_1 = \"31+\";
        }
        if (lastVar2_1 == 31) {
            lastVar2_1 = \"31+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" этаж\";
        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"31+\")) {
            resultat2 = \"Этаж\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этаж\";
        }
        $( \"#cat_amount-floor\" ).val(resultat2);
        $(\"#cat_slider-range-floor .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-floor .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-floorInObj_1\" ).slider({
                    range: true,
                    min: 1,
                    max: 31,
                values: [ 1, 31 ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[0];
            var lastVar2 = ui.values[1];
            $(\"#cat_amount-floorInObj_1_min\").val(lastVar1);
            $(\"#cat_amount-floorInObj_1_max\").val(lastVar2);
            if (lastVar1 == 31) {
                lastVar1 = \"31+\";
            }
            if (lastVar2 == 31) {
                lastVar2 = \"31+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" этажей\";
            } else if ((lastVar1 == 1) && (lastVar2 == \"31+\")) {
                resultat = \"Этажей в доме\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" этажей\";
            }
            $(\"#cat_amount-floorInObj_1\").val(resultat);
            $(\"#cat_slider-range-floorInObj_1 .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-floorInObj_1 .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-floorInObj_1\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-floorInObj_1\" ).slider( \"values\", 1 );
        $( \"#cat_amount-floorInObj_1_min\" ).val(lastVar1_1);
        $( \"#cat_amount-floorInObj_1_max\" ).val(lastVar2_1);

        if (lastVar1_1 == 31) {
            lastVar1_1 = \"31+\";
        }
        if (lastVar2_1 == 31) {
            lastVar2_1 = \"31+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" этажей\";
        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"31+\")) {
            resultat2 = \"Этажей в доме\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этажей\";
        }
        $( \"#cat_amount-floorInObj_1\" ).val(resultat2);
        $(\"#cat_slider-range-floorInObj_1 .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-floorInObj_1 .ui-slider-handle\").last().text(lastVar2_1);


        $( \"#cat_slider-range-floorInObj_2\" ).slider({
                    range: true,
                    min: 1,
                    max: 5,
                values: [ 1, 5 ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[0];
            var lastVar2 = ui.values[1];
            $(\"#cat_amount-floorInObj_2_min\").val(lastVar1);
            $(\"#cat_amount-floorInObj_2_max\").val(lastVar2);
            if (lastVar1 == 5) {
                lastVar1 = \"5+\";
            }
            if (lastVar2 == 5) {
                lastVar2 = \"5+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" этажей\";
            } else if ((lastVar1 == 1) && (lastVar2 == \"5+\")) {
                resultat = \"Этажей в доме\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" этажей\";
            }
            $(\"#cat_amount-floorInObj_2\").val(resultat);
            $(\"#cat_slider-range-floorInObj_2 .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-floorInObj_2 .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-floorInObj_2\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-floorInObj_2\" ).slider( \"values\", 1 );
        $( \"#cat_amount-floorInObj_2_min\" ).val(lastVar1_1);
        $( \"#cat_amount-floorInObj_2_max\" ).val(lastVar2_1);

        if (lastVar1_1 == 5) {
            lastVar1_1 = \"5+\";
        }
        if (lastVar2_1 == 5) {
            lastVar2_1 = \"5+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" этажей\";
        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"5+\")) {
            resultat2 = \"Этажей в доме\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этажей\";
        }
        $( \"#cat_amount-floorInObj_2\" ).val(resultat2);
        $(\"#cat_slider-range-floorInObj_2 .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-floorInObj_2 .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-square_1\" ).slider({
                    range: true,
                    min: 10,
                    max: 200,
                values: [ 10, 200 ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[ 0 ];
            var lastVar2 = ui.values[ 1 ];
            $( \"#cat_amount-square_min\" ).val(lastVar1);
            $( \"#cat_amount-square_max\" ).val(lastVar2);
            if (lastVar1 == 200) {
                lastVar1 = \"200+\";
            }
            if (lastVar2 == 200) {
                lastVar2 = \"200+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" м²\";
            } else if ( (lastVar1 == 10) && (lastVar2 == \"200+\")) {
                resultat = \"Площадь, м²\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" м²\";
            }
            $( \"#cat_amount-square_1\" ).val(resultat);
            $(\"#cat_slider-range-square_1 .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-square_1 .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-square_1\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-square_1\" ).slider( \"values\", 1 );
        $( \"#cat_amount-square_min\" ).val(lastVar1_1);
        $( \"#cat_amount-square_max\" ).val(lastVar2_1);
        if (lastVar1_1 == 200) {
            lastVar1_1 = \"200+\";
        }
        if (lastVar2_1 == 200) {
            lastVar2_1 = \"200+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" м²\";
        } else if ((lastVar1_1 == 10) && (lastVar2_1 == \"200+\")) {
            resultat2 = \"Площадь, м²\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" м²\";
        }
        $( \"#cat_amount-square_1\" ).val(resultat2);
        $(\"#cat_slider-range-square_1 .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-square_1 .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-square_2\" ).slider({
                    range: true,
                    min: 10,
                    max: 500,
                values: [ 10, 500 ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[ 0 ];
            var lastVar2 = ui.values[ 1 ];
            $( \"#cat_amount-square_2_min\" ).val(lastVar1);
            $( \"#cat_amount-square_2_max\" ).val(lastVar2);
            if (lastVar1 == 500) {
                lastVar1 = \"500+\";
            }
            if (lastVar2 == 500) {
                lastVar2 = \"500+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" м²\";
            } else if ( (lastVar1 == 10) && (lastVar2 == \"500+\")) {
                resultat = \"Площадь дома, м²\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" м²\";
            }
            $( \"#cat_amount-square_2\" ).val(resultat);
            $(\"#cat_slider-range-square_2 .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-square_2 .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-square_2\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-square_2\" ).slider( \"values\", 1 );
        $( \"#cat_amount-square_2_min\" ).val(lastVar1_1);
        $( \"#cat_amount-square_2_max\" ).val(lastVar2_1);
        if (lastVar1_1 == 500) {
            lastVar1_1 = \"500+\";
        }
        if (lastVar2_1 == 500) {
            lastVar2_1 = \"500+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" м²\";
        } else if ((lastVar1_1 == 10) && (lastVar2_1 == \"500+\")) {
            resultat2 = \"Площадь дома, м²\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" м²\";
        }
        $( \"#cat_amount-square_2\" ).val(resultat2);
        $(\"#cat_slider-range-square_2 .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-square_2 .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-square_earth\" ).slider({
                    range: true,
                    min: 1,
                    max: 100,
                values: [ 1, 100 ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[ 0 ];
            var lastVar2 = ui.values[ 1 ];
            $( \"#cat_amount-square_earth_min\" ).val(lastVar1);
            $( \"#cat_amount-square_earth_max\" ).val(lastVar2);
            if (lastVar1 == 100) {
                lastVar1 = \"100+\";
            }
            if (lastVar2 == 100) {
                lastVar2 = \"100+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" сот.\";
            } else if ( (lastVar1 == 1) && (lastVar2 == \"100+\")) {
                resultat = \"Площадь участка, сот.\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" сот.\";
            }
            $( \"#cat_amount-square_earth\" ).val(resultat);
            $(\"#cat_slider-range-square_earth .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-square_earth .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-square_earth\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-square_earth\" ).slider( \"values\", 1 );
        $( \"#cat_amount-square_earth_min\" ).val(lastVar1_1);
        $( \"#cat_amount-square_earth_max\" ).val(lastVar2_1);
        if (lastVar1_1 == 100) {
            lastVar1_1 = \"100+\";
        }
        if (lastVar2_1 == 100) {
            lastVar2_1 = \"100+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" сот.\";
        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"100+\")) {
            resultat2 = \"Площадь участка, сот.\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" сот.\";
        }
        $( \"#cat_amount-square_earth\" ).val(resultat2);
        $(\"#cat_slider-range-square_earth .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-square_earth .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-distance\" ).slider({
                    range: true,
                    min: 0,
                    max: 100,
                values: [ 0, 100 ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[ 0 ];
            var lastVar2 = ui.values[ 1 ];
            $( \"#cat_amount-distance_min\" ).val(lastVar1);
            $( \"#cat_amount-distance_max\" ).val(lastVar2);
            if (lastVar1 == 100) {
                lastVar1 = \"100+\";
            }
            if (lastVar2 == 100) {
                lastVar2 = \"100+\";
            }
            if (lastVar1 == 0 && lastVar2 == 0) {
                lastVar1 = \"В черте города\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" км.\";
            } else if ( (lastVar1 == 0) && (lastVar2 == \"100+\")) {
                resultat = \"Расстояние до города, км.\";
            } else if (lastVar1 == \"В черте города\") {
                resultat = \"В черте города\";
                lastVar1 = 0;
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" км.\";
            }
            $( \"#cat_amount-distance\" ).val(resultat);
            $(\"#cat_slider-range-distance .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-distance .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-distance\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-distance\" ).slider( \"values\", 1 );
        $( \"#cat_amount-distance_min\" ).val(lastVar1_1);
        $( \"#cat_amount-distance_max\" ).val(lastVar2_1);
        if (lastVar1_1 == 100) {
            lastVar1_1 = \"100+\";
        }
        if (lastVar2_1 == 100) {
            lastVar2_1 = \"100+\";
        }
        if (lastVar1_1 == 0 && lastVar2_1 == 0) {
            lastVar1_1 = \"В черте города\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" км.\";
        } else if ((lastVar1_1 == 0) && (lastVar2_1 == \"100+\")) {
            resultat2 = \"Расстояние до города, км.\";
        } else if (lastVar1_1 == \"В черте города\") {
            resultat2 = \"В черте города\";
            lastVar1_1 = 0;
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" км.\";
        }
        $( \"#cat_amount-distance\" ).val(resultat2);
        $(\"#cat_slider-range-distance .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-distance .ui-slider-handle\").last().text(lastVar2_1);


        $('.cat_slide').click(function(){
            var show = $(this).attr('show');
            if(show == 1){
                $(this).attr('show', 0);
                $(this).html(\"Подробный поиск\");
                $('#dop_cat_filter').slideUp();
            }else{
                $(this).attr('show', 1);
                $(this).html(\"Свернуть\");
                $('#dop_cat_filter').slideDown();
            }
        });
        $( function() {
            $( \"#cat_rooms_search :checkbox\" ).checkboxradio({
                icon: false
            });
        });
    });
               ";
           } else {
               $floor_min = $request->input("floor_min");
               $floor_max = $request->input("floor_max");
               $floorInObj_2_min = $request->input("floorInObj_2_min");
               $floorInObj_2_max = $request->input("floorInObj_2_max");
               $floorInObj_1_min = $request->input("floorInObj_1_min");
               $floorInObj_1_max = $request->input("floorInObj_1_max");
               $square_1_min = $request->input("square_1_min");
               $square_1_max = $request->input("square_1_max");
               $square_2_min = $request->input("square_2_min");
               $square_2_max = $request->input("square_2_max");
               $square_earth_min = $request->input("square_earth_min");
               $square_earth_max = $request->input("square_earth_max");
               $distance_min = $request->input("distance_min");
               $distance_max = $request->input("distance_max");
               $this->content = "
               $this->cat_script_js
               $(document).ready(function() {
               ".($specOffer ? $this->specOffer_js : "")."
        $( \"#cat_slider-range-floor\" ).slider({
                    range: true,
                    min: 1,
                    max: 31,
                values: [ $floor_min, $floor_max ],
                slide: function( event, ui ) {

            var lastVar1 = ui.values[0];
            var lastVar2 = ui.values[1];
            $(\"#cat_amount-floor_min\").val(lastVar1);
            $(\"#cat_amount-floor_max\").val(lastVar2);
            if (lastVar1 == 31) {
                lastVar1 = \"31+\";
            }
            if (lastVar2 == 31) {
                lastVar2 = \"31+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" этаж\";
            } else if ((lastVar1 == 1) && (lastVar2 == \"31+\")) {
                resultat = \"Этаж\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" этаж\";
            }
            $(\"#cat_amount-floor\").val(resultat);
            $(\"#cat_slider-range-floor .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-floor .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-floor\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-floor\" ).slider( \"values\", 1 );
        $( \"#cat_amount-floor_min\" ).val(lastVar1_1);
        $( \"#cat_amount-floor_max\" ).val(lastVar2_1);

        if (lastVar1_1 == 31) {
            lastVar1_1 = \"31+\";
        }
        if (lastVar2_1 == 31) {
            lastVar2_1 = \"31+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" этаж\";
        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"31+\")) {
            resultat2 = \"Этаж\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этаж\";
        }
        $( \"#cat_amount-floor\" ).val(resultat2);
        $(\"#cat_slider-range-floor .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-floor .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-floorInObj_1\" ).slider({
                    range: true,
                    min: 1,
                    max: 31,
                values: [ $floorInObj_1_min, $floorInObj_1_max ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[0];
            var lastVar2 = ui.values[1];
            $(\"#cat_amount-floorInObj_1_min\").val(lastVar1);
            $(\"#cat_amount-floorInObj_1_max\").val(lastVar2);
            if (lastVar1 == 31) {
                lastVar1 = \"31+\";
            }
            if (lastVar2 == 31) {
                lastVar2 = \"31+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" этажей\";
            } else if ((lastVar1 == 1) && (lastVar2 == \"31+\")) {
                resultat = \"Этажей в доме\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" этажей\";
            }
            $(\"#cat_amount-floorInObj_1\").val(resultat);
            $(\"#cat_slider-range-floorInObj_1 .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-floorInObj_1 .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-floorInObj_1\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-floorInObj_1\" ).slider( \"values\", 1 );
        $( \"#cat_amount-floorInObj_1_min\" ).val(lastVar1_1);
        $( \"#cat_amount-floorInObj_1_max\" ).val(lastVar2_1);

        if (lastVar1_1 == 31) {
            lastVar1_1 = \"31+\";
        }
        if (lastVar2_1 == 31) {
            lastVar2_1 = \"31+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" этажей\";
        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"31+\")) {
            resultat2 = \"Этажей в доме\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этажей\";
        }
        $( \"#cat_amount-floorInObj_1\" ).val(resultat2);
        $(\"#cat_slider-range-floorInObj_1 .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-floorInObj_1 .ui-slider-handle\").last().text(lastVar2_1);


        $( \"#cat_slider-range-floorInObj_2\" ).slider({
                    range: true,
                    min: 1,
                    max: 5,
                values: [ $floorInObj_2_min, $floorInObj_2_max ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[0];
            var lastVar2 = ui.values[1];
            $(\"#cat_amount-floorInObj_2_min\").val(lastVar1);
            $(\"#cat_amount-floorInObj_2_max\").val(lastVar2);
            if (lastVar1 == 5) {
                lastVar1 = \"5+\";
            }
            if (lastVar2 == 5) {
                lastVar2 = \"5+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" этажей\";
            } else if ((lastVar1 == 1) && (lastVar2 == \"5+\")) {
                resultat = \"Этажей в доме\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" этажей\";
            }
            $(\"#cat_amount-floorInObj_2\").val(resultat);
            $(\"#cat_slider-range-floorInObj_2 .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-floorInObj_2 .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-floorInObj_2\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-floorInObj_2\" ).slider( \"values\", 1 );
        $( \"#cat_amount-floorInObj_2_min\" ).val(lastVar1_1);
        $( \"#cat_amount-floorInObj_2_max\" ).val(lastVar2_1);

        if (lastVar1_1 == 5) {
            lastVar1_1 = \"5+\";
        }
        if (lastVar2_1 == 5) {
            lastVar2_1 = \"5+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" этажей\";
        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"5+\")) {
            resultat2 = \"Этажей в доме\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" этажей\";
        }
        $( \"#cat_amount-floorInObj_2\" ).val(resultat2);
        $(\"#cat_slider-range-floorInObj_2 .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-floorInObj_2 .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-square_1\" ).slider({
                    range: true,
                    min: 10,
                    max: 200,
                values: [ $square_1_min, $square_1_max ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[ 0 ];
            var lastVar2 = ui.values[ 1 ];
            $( \"#cat_amount-square_min\" ).val(lastVar1);
            $( \"#cat_amount-square_max\" ).val(lastVar2);
            if (lastVar1 == 200) {
                lastVar1 = \"200+\";
            }
            if (lastVar2 == 200) {
                lastVar2 = \"200+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" м²\";
            } else if ( (lastVar1 == 10) && (lastVar2 == \"200+\")) {
                resultat = \"Площадь, м²\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" м²\";
            }
            $( \"#cat_amount-square_1\" ).val(resultat);
            $(\"#cat_slider-range-square_1 .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-square_1 .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-square_1\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-square_1\" ).slider( \"values\", 1 );
        $( \"#cat_amount-square_min\" ).val(lastVar1_1);
        $( \"#cat_amount-square_max\" ).val(lastVar2_1);
        if (lastVar1_1 == 200) {
            lastVar1_1 = \"200+\";
        }
        if (lastVar2_1 == 200) {
            lastVar2_1 = \"200+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" м²\";
        } else if ((lastVar1_1 == 10) && (lastVar2_1 == \"200+\")) {
            resultat2 = \"Площадь, м²\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" м²\";
        }
        $( \"#cat_amount-square_1\" ).val(resultat2);
        $(\"#cat_slider-range-square_1 .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-square_1 .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-square_2\" ).slider({
                    range: true,
                    min: 10,
                    max: 500,
                values: [ $square_2_min, $square_2_max ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[ 0 ];
            var lastVar2 = ui.values[ 1 ];
            $( \"#cat_amount-square_2_min\" ).val(lastVar1);
            $( \"#cat_amount-square_2_max\" ).val(lastVar2);
            if (lastVar1 == 500) {
                lastVar1 = \"500+\";
            }
            if (lastVar2 == 500) {
                lastVar2 = \"500+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" м²\";
            } else if ( (lastVar1 == 10) && (lastVar2 == \"500+\")) {
                resultat = \"Площадь дома, м²\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" м²\";
            }
            $( \"#cat_amount-square_2\" ).val(resultat);
            $(\"#cat_slider-range-square_2 .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-square_2 .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-square_2\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-square_2\" ).slider( \"values\", 1 );
        $( \"#cat_amount-square_2_min\" ).val(lastVar1_1);
        $( \"#cat_amount-square_2_max\" ).val(lastVar2_1);
        if (lastVar1_1 == 500) {
            lastVar1_1 = \"500+\";
        }
        if (lastVar2_1 == 500) {
            lastVar2_1 = \"500+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" м²\";
        } else if ((lastVar1_1 == 10) && (lastVar2_1 == \"500+\")) {
            resultat2 = \"Площадь дома, м²\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" м²\";
        }
        $( \"#cat_amount-square_2\" ).val(resultat2);
        $(\"#cat_slider-range-square_2 .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-square_2 .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-square_earth\" ).slider({
                    range: true,
                    min: 1,
                    max: 100,
                values: [ $square_earth_min, $square_earth_max ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[ 0 ];
            var lastVar2 = ui.values[ 1 ];
            $( \"#cat_amount-square_earth_min\" ).val(lastVar1);
            $( \"#cat_amount-square_earth_max\" ).val(lastVar2);
            if (lastVar1 == 100) {
                lastVar1 = \"100+\";
            }
            if (lastVar2 == 100) {
                lastVar2 = \"100+\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" сот.\";
            } else if ( (lastVar1 == 1) && (lastVar2 == \"100+\")) {
                resultat = \"Площадь участка, сот.\";
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" сот.\";
            }
            $( \"#cat_amount-square_earth\" ).val(resultat);
            $(\"#cat_slider-range-square_earth .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-square_earth .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-square_earth\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-square_earth\" ).slider( \"values\", 1 );
        $( \"#cat_amount-square_earth_min\" ).val(lastVar1_1);
        $( \"#cat_amount-square_earth_max\" ).val(lastVar2_1);
        if (lastVar1_1 == 100) {
            lastVar1_1 = \"100+\";
        }
        if (lastVar2_1 == 100) {
            lastVar2_1 = \"100+\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" сот.\";
        } else if ((lastVar1_1 == 1) && (lastVar2_1 == \"100+\")) {
            resultat2 = \"Площадь участка, сот.\";
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" сот.\";
        }
        $( \"#cat_amount-square_earth\" ).val(resultat2);
        $(\"#cat_slider-range-square_earth .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-square_earth .ui-slider-handle\").last().text(lastVar2_1);

        $( \"#cat_slider-range-distance\" ).slider({
                    range: true,
                    min: 0,
                    max: 100,
                values: [ $distance_min, $distance_max ],
                slide: function( event, ui ) {
            var lastVar1 = ui.values[ 0 ];
            var lastVar2 = ui.values[ 1 ];
            $( \"#cat_amount-distance_min\" ).val(lastVar1);
            $( \"#cat_amount-distance_max\" ).val(lastVar2);
            if (lastVar1 == 100) {
                lastVar1 = \"100+\";
            }
            if (lastVar2 == 100) {
                lastVar2 = \"100+\";
            }
            if (lastVar1 == 0 && lastVar2 == 0) {
                lastVar1 = \"В черте города\";
            }
            var resultat = \"\";
            if (lastVar1 == lastVar2) {
                resultat = lastVar2 + \" км.\";
            } else if ( (lastVar1 == 0) && (lastVar2 == \"100+\")) {
                resultat = \"Расстояние до города, км.\";
            } else if (lastVar1 == \"В черте города\") {
                resultat = \"В черте города\";
                lastVar1 = 0;
            } else {
                resultat = lastVar1 + \" - \" + lastVar2 + \" км.\";
            }
            $( \"#cat_amount-distance\" ).val(resultat);
            $(\"#cat_slider-range-distance .ui-slider-handle\").first().text(lastVar1);
            $(\"#cat_slider-range-distance .ui-slider-handle\").last().text(lastVar2);
        }
    });
        var lastVar1_1 = $( \"#cat_slider-range-distance\" ).slider( \"values\", 0 );
        var lastVar2_1 = $( \"#cat_slider-range-distance\" ).slider( \"values\", 1 );
        $( \"#cat_amount-distance_min\" ).val(lastVar1_1);
        $( \"#cat_amount-distance_max\" ).val(lastVar2_1);
        if (lastVar1_1 == 100) {
            lastVar1_1 = \"100+\";
        }
        if (lastVar2_1 == 100) {
            lastVar2_1 = \"100+\";
        }
        if (lastVar1_1 == 0 && lastVar2_1 == 0) {
            lastVar1_1 = \"В черте города\";
        }
        var resultat2 = \"\";
        if (lastVar1_1 == lastVar2_1) {
            resultat2 = lastVar2_1 + \" км.\";
        } else if ((lastVar1_1 == 0) && (lastVar2_1 == \"100+\")) {
            resultat2 = \"Расстояние до города, км.\";
        } else if (lastVar1_1 == \"В черте города\") {
            resultat2 = \"В черте города\";
            lastVar1_1 = 0;
        } else {
            resultat2 = lastVar1_1 + \" - \" + lastVar2_1 + \" км.\";
        }
        $( \"#cat_amount-distance\" ).val(resultat2);
        $(\"#cat_slider-range-distance .ui-slider-handle\").first().text(lastVar1_1);
        $(\"#cat_slider-range-distance .ui-slider-handle\").last().text(lastVar2_1);
        
        var myChoise = $ ('#cat_city :selected').val();
                            if (myChoise == 1) {
                                $('#cat_amount-area_1').show();
                                $('#cat_amount-area_2').hide();
                            } else if (myChoise == 2) {
                                $('#cat_amount-area_1').hide();
                                $('#cat_amount-area_2').show();
                            } else {
                                $('#cat_amount-area_1').hide();
                                $('#cat_amount-area_2').hide();
                            }
        
        var myChoise = $ ('#cat_type :selected').val();
                            if (myChoise == 2) {
                                $('#cat_formObj_3').hide();
                                $('#cat_amount-floor').hide();
                                $('#cat_amount-typeHouse_1').hide();
                                $('#cat_amount-floorInObj_1').hide();
                                $('#cat_formObj_1').hide();
                                $('#cat_typeHouse_1').hide();
                                $('#cat_amount-rooms').hide();
                                $('#cat_amount-formObj_2').show();
                                $('#cat_amount-typeHouse_2').show();
                                $('#cat_amount-square_earth').show();
                                $('#cat_amount-floorInObj_2').show();
                                $('#cat_typeHouse_2').show();
                                $('#cat_amount-square_2').show();
                                $('#cat_amount-distance').show();
                                $('#cat_amount-square_1').hide();
                            } else if (myChoise == 3){
                               $('#cat_amount-typeHouse_2').hide();
                                $('#cat_amount-floorInObj_1').show();
                                $('#cat_formObj_3').show();
                                $('#cat_amount-floor').show();
                                $('#cat_amount-typeHouse_1').show();
                                $('#cat_formObj_1').hide();
                                $('#cat_typeHouse_1').show();
                                $('#cat_amount-rooms').show();
                                $('#cat_amount-formObj_2').hide();
                                $('#cat_amount-square_earth').hide();
                                $('#cat_amount-floorInObj_2').hide();
                                $('#cat_typeHouse_2').hide();
                                $('#cat_amount-square_2').hide();
                                $('#cat_amount-distance').hide();
                                $('#cat_amount-square_1').show();
                            } else {
                                $('#cat_amount-typeHouse_2').hide();
                                $('#cat_amount-typeHouse_1').show();
                                $('#cat_formObj_3').hide();
                                $('#cat_amount-floor').show();
                                $('#cat_amount-floorInObj_1').show();
                                $('#cat_formObj_1').show();
                                $('#cat_typeHouse_1').show();
                                $('#cat_amount-rooms').show();
                                $('#cat_amount-formObj_2').hide();
                                $('#cat_amount-square_earth').hide();
                                $('#cat_amount-floorInObj_2').hide();
                                $('#cat_typeHouse_2').hide();
                                $('#cat_amount-square_2').hide();
                                $('#cat_amount-distance').hide();
                                $('#cat_amount-square_1').show();
                            }                                         

        $('.cat_slide').click(function(){
            var show = $(this).attr('show');
            if(show == 1){
                $(this).attr('show', 0);
                $(this).html(\"Подробный поиск\");
                $('#dop_cat_filter').slideUp();
            }else{
                $(this).attr('show', 1);
                $(this).html(\"Свернуть\");
                $('#dop_cat_filter').slideDown();
            }
        });
       
        
        $( function() {
            $( \"#cat_rooms_search :checkbox\" ).checkboxradio({
                icon: false
            });
        });
    });
               ";
           }
               break;
           default:
               break;
       }
    $this->storageJs($randStr);
    }

    private function getEditScript($object) {
        switch ($object->category) {
            case "1": $text = "
                    $(\"#obj_type option\").not(\"[value=1]\").attr(\"disabled\", \"disabled\");
        ";
                break;
            case "2": $text = "
                    $('#obj_form_1').hide();
                    $('#room').hide();
                    $('#build_type_1').hide();
                    $('#floor').hide();
                    $('#home_floors_1').hide();
                    $('#square').hide();
                    $('#obj_form_3').hide();
                    $('#earth_square').show();
                    $('#distance').show();
                    $('#house_square').show();
                    $('#build_type_2').show();
                    $('#obj_form_2').show();
                    $('#home_floors_2').show();
                    $(\"#obj_type option\").not(\"[value=2]\").attr(\"disabled\", \"disabled\");
        ";
                break;
            case "3": $text = "
                    $('#obj_form_3').show();
                    $('#obj_form_1').hide();
                    $(\"#obj_type option\").not(\"[value=3]\").attr(\"disabled\", \"disabled\");
        ";
                break;
            default: break;
        }
        $text .= "
                    ymaps.ready(function () {
            var myMap = window.map = new ymaps.Map('YMapsID', {
                    center: [".$object->geo."],
                    zoom: 16,
                    behaviors: ['default']

                        }),
                    searchControl = new SearchAddress(myMap, $('form'));
                            myMap.controls.add(
                new ymaps.control.ZoomControl()
        );
        myMap.controls.add('typeSelector'),
                     _point = new ymaps.Placemark([".$object->geo."], {
                balloonContentBody: \"".$object->address."\"
                
                    });
                    myMap.geoObjects.add(_point);});
                    var myChoise = $('#obj_city select').val();
                    $('#obj_city select option').each(function () {
                            var myChoise2 = $(this).val();
                            if (myChoise2 == myChoise) {
                                $('#obj_area'+myChoise).show();
                            } else {
                                $('#obj_area'+myChoise2).hide();
                            }
                        });
                    ";

        return $text;
    }

    private function getEditComforts($object) {
        $comforts_id = array();
        if(!$object->comforts->isEmpty()) {
            foreach ($object->comforts as $comfort) {
                $comforts_id[] = $comfort->title;
            }
        }
        return implode("','", $comforts_id);
    }

    private function storageJs($str) {
        Storage::disk('js')->put('script-'.$str.'.js', $this->content);
    }


}