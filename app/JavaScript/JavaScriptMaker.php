<?php
/**
 * Created by PhpStorm.
 * User: Трик
 * Date: 15.05.2017
 * Time: 22:43
 */
namespace App\JavaScript;

use Storage;

class JavaScriptMaker {

    protected $content;
    protected $typeScript;

    public function setJs($type, $request = "", $static = true) {
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
                 ";   
               }
               break;
           default:
               break;
       }
    $this->storageJs();
    }

    private function storageJs() {
        Storage::disk('js')->put('script.js', $this->content);
    }


}