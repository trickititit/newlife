<?php

namespace App\Repositories;

use App\Object;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ImagesRepository;
use App\Repositories\ComfortsRepository;
use App\Repositories\AreasRepository;
use Gate;
use Illuminate\Support\Facades\Input;

class ObjectsRepository extends Repository {

    protected $i_rep;
    protected $c_rep;
    protected $a_rep;

    public function __construct(Object $object, ImagesRepository $i_rep, ComfortsRepository $c_rep, AreasRepository $a_rep) {
        $this->model = $object;
        $this->i_rep = $i_rep;
        $this->c_rep = $c_rep;
        $this->a_rep = $a_rep;

    }

    public function addObject($request) {
        $this->model = new Object();
        if (true) {
            if($request->obj_rooms == "Студия") {
                $request->obj_rooms = 1;
            }
            if($request->obj_city == "Волгоград") {
                $request->obj_city = 1;
                $request->obj_area = 1;
            } else {
                $where = array("name", $request->obj_area);
                $area = $this->a_rep->get("*", false, false, $where);
                $request->obj_area = $area[0]->id;
            }
            $obj_type = $request->obj_category;
            $obj_area_input = "obj_area" . $request->obj_city;
            $user = Auth::user();
            $temp_obj_id = $request->id + 3453453;
            $request->comfort = "";
            switch ($obj_type) {
                case "1" :  $this->model->category = $request->obj_category;
                $this->model->deal = $request->obj_deal;
                $this->model->type = $request->obj_type;
                $this->model->city = $request->obj_city;
                $this->model->area = $request->obj_area;
                $this->model->address = $request->obj_address;
                $this->model->rooms = $request->obj_rooms;
                $this->model->floor = $request->obj_floor;
                $this->model->square = $request->obj_square;
                $this->model->square_kitchen = 0;
                $this->model->square_life = 0;
                $this->model->build_type = $request->obj_build_type;
                $this->model->build_floors = $request->obj_home_floors;
                $this->model->desc = $request->obj_desc;
                $this->model->comment = $request->obj_desc_short;
                $this->model->price_square =  $request->obj_price / $request->obj_square;
                $this->model->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                $this->model->surcharge = $request->obj_doplata;
                $this->model->geo = $request->obj_geo;
                $this->model->created_id = $user->id;
                $this->model->spec_offer_span_1 = (isset($request->spec_offer_span_1)? $request->spec_offer_span_1 : null);
                $this->model->spec_offer_span_2 = (isset($request->spec_offer_span_2)? $request->spec_offer_span_2 : null);
                $this->model->spec_offer = (isset($request->spec_offer)? 1 : null);
                $client = new \stdClass;
                $client->name = "";
                $client->family = "";
                $client->father_name = "";
                $client->place = "";
                $client->date = "";
                $client->mail = "";
                $client->pasport = "";
                $client->pasport_who_take = "";
                $client->pasport_date = "";
                $client->need = "";
                $client->phone = $request->obj_client_contact;
                $this->model->client = json_encode($client, JSON_UNESCAPED_UNICODE);
                    if($this->model->save()) {
                        $this->i_rep->createImgs($temp_obj_id, $this->model->id);
                        $comforts = $this->c_rep->getComfortsId($request->comfort);
                        if ($comforts) {
                            $this->model->comforts()->attach($comforts);
                        }
                        $this->model->alias = $this->getAlias($this->model);
                        $this->model->update();
                        return ['status' => 'Материал добавлен'];
                    }
                break;
                case "2":   $this->model->category = $request->obj_category;
                    $this->model->deal = $request->obj_deal;
                    $this->model->type = $request->obj_type;
                    $this->model->city = $request->obj_city;
                    $this->model->area = $request->obj_area;
                    $this->model->address = $request->obj_address;
                    $this->model->home_square = $request->obj_house_square;
                    $this->model->build_type = $request->obj_build_type;
                    $this->model->build_floors = $request->obj_home_floors;
                    $this->model->distance = $request->obj_distance;
                    $this->model->earth_square = $request->obj_earth_square;
                    $this->model->desc = $request->obj_desc;
                    $this->model->comment = $request->obj_desc_short;
                    $this->model->price_square =  $request->obj_price / $request->obj_house_square;
                    $this->model->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                    $this->model->surcharge = $request->obj_doplata;
                    $this->model->geo = $request->obj_geo;
                    $this->model->created_id = $user->id;
                    $this->model->spec_offer_span_1 = (isset($request->spec_offer_span_1)? $request->spec_offer_span_1 : null);
                    $this->model->spec_offer_span_2 = (isset($request->spec_offer_span_2)? $request->spec_offer_span_2 : null);
                    $this->model->spec_offer = (isset($request->spec_offer)? 1 : null);
                    $client = new \stdClass;
                    $client->name = "";
                    $client->family = "";
                    $client->father_name = "";
                    $client->place = "";
                    $client->date = "";
                    $client->mail = "";
                    $client->pasport = "";
                    $client->pasport_who_take = "";
                    $client->pasport_date = "";
                    $client->need = "";
                    $client->phone = $request->obj_client_contact;
                    $this->model->client = json_encode($client, JSON_UNESCAPED_UNICODE);
                    if($this->model->save()) {
                        $this->i_rep->createImgs($temp_obj_id, $this->model->id);
                        $comforts = $this->c_rep->getComfortsId($request->comfort);
                        if ($comforts) {
                            $this->model->comforts()->attach($comforts);
                        }
                        $this->model->alias = $this->getAlias($this->model);
                        $this->model->update();
                        return ['status' => 'Материал добавлен'];
                    }
                break;
                case "3":   $this->model->category = $request->obj_category;
                    $this->model->deal = $request->obj_deal;
                    $this->model->type = $request->obj_type;
                    $this->model->city = $request->obj_city;
                    $this->model->area = $request->obj_area;
                    $this->model->address = $request->obj_address;
                    $this->model->rooms = $request->obj_rooms;
                    $this->model->floor = $request->obj_floor;
                    $this->model->square = $request->obj_square;
                    $this->model->square_kitchen = 0;
                    $this->model->square_life = 0;
                    $this->model->build_type = $request->obj_build_type;
                    $this->model->build_floors = $request->obj_home_floors;
                    $this->model->desc = $request->obj_desc;
                    $this->model->comment = $request->obj_desc_short;
                    $this->model->price_square =  $request->obj_price / $request->obj_square;
                    $this->model->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                    $this->model->surcharge = $request->obj_doplata;
                    $this->model->geo = $request->obj_geo;
                    $this->model->created_id = $user->id;
                    $this->model->spec_offer_span_1 = (isset($request->spec_offer_span_1)? $request->spec_offer_span_1 : null);
                    $this->model->spec_offer_span_2 = (isset($request->spec_offer_span_2)? $request->spec_offer_span_2 : null);
                    $this->model->spec_offer = (isset($request->spec_offer)? 1 : null);
                    $client = new \stdClass;
                    $client->name = "";
                    $client->family = "";
                    $client->father_name = "";
                    $client->place = "";
                    $client->date = "";
                    $client->mail = "";
                    $client->pasport = "";
                    $client->pasport_who_take = "";
                    $client->pasport_date = "";
                    $client->need = "";
                    $client->phone = $request->obj_client_contact;
                    $this->model->client = json_encode($client, JSON_UNESCAPED_UNICODE);
                    if($this->model->save()) {
                        $this->i_rep->createImgs($temp_obj_id, $this->model->id);
                        $comforts = $this->c_rep->getComfortsId($request->comfort);
                        if ($comforts) {
                            $this->model->comforts()->attach($comforts);
                        }
                        $this->model->alias = $this->getAlias($this->model);
                        $this->model->update();
                        return ['status' => 'Материал добавлен'];
                    }
                break;
                default: break;
            }
        } else {
            return array('error' => 'Нет данных');
        }

    }

    public function updateObject($request, $object) {
        if ($request->has("obj_type")) {
            $obj_type = $request->obj_type;
            $obj_area_input = "obj_area" . $request->obj_city;
            switch ($obj_type) {
                case "1" :  
                    $object->deal = $request->obj_deal;
                    $object->type = $request->obj_form_1;
                    $object->city = $request->obj_city;
                    $object->area = $request->input($obj_area_input);
                    $object->address = $request->obj_address;
                    $object->rooms = $request->obj_room;
                    $object->floor = $request->obj_floor;
                    $object->square = $request->obj_square;
                    $object->square_kitchen = $request->obj_square_kitchen;
                    $object->square_life = $request->obj_square_life;
                    $object->build_type = $request->obj_build_type_1;
                    $object->build_floors = $request->obj_home_floors_1;
                    $object->desc = $request->obj_desc;
                    $object->comment = $request->obj_comment;
                    $object->price_square =  preg_replace("/[^0-9]/", '',$request->obj_price_square);
                    $object->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                    $object->surcharge =  preg_replace("/[^0-9]/", '',$request->obj_doplata);
                    $object->geo = $request->obj_geo;
                    $object->spec_offer_span_1 = (isset($request->spec_offer_span_1)? $request->spec_offer_span_1 : null);
                    $object->spec_offer_span_2 = (isset($request->spec_offer_span_2)? $request->spec_offer_span_2 : null);
                    $object->spec_offer = (isset($request->spec_offer)? 1 : null);
                    $client = new \stdClass;
                    $client->name = $request->client_name;
                    $client->family = $request->client_family;
                    $client->father_name = $request->client_father_name;
                    $client->place = $request->client_place;
                    $client->date = $request->client_date;
                    $client->phone = $request->client_phone;
                    $client->mail = $request->client_mail;
                    $client->pasport = $request->client_pasport;
                    $client->need = $request->client_need;
                    $client->pasport_who_take = $request->client_pasport_who_take;
                    $client->pasport_date = $request->client_pasport_date;
                    $object->client = json_encode($client, JSON_UNESCAPED_UNICODE);
                    if($object->update()) {
                        $comforts = $this->c_rep->getComfortsId($request->comfort);
                        if($comforts) {
                            $object->comforts()->sync($comforts);
                        } else {
                            $object->comforts()->detach();
                        }
                        $object->alias = $this->getAlias($object);
                        $object->update();
                        return ['status' => 'Объект обновлен'];
                    }
                    break;
                case "2":
                    $object->deal = $request->obj_deal;
                    $object->type = $request->obj_form_2;
                    $object->city = $request->obj_city;
                    $object->area = $request->input($obj_area_input);
                    $object->address = $request->obj_address;
                    $object->home_square = $request->obj_house_square;
                    $object->build_type = $request->obj_build_type_2;
                    $object->build_floors = $request->obj_home_floors_2;
                    $object->distance = $request->obj_distance;
                    $object->earth_square = $request->obj_earth_square;
                    $object->desc = $request->obj_desc;
                    $object->comment = $request->obj_comment;
                    $object->price_square =  preg_replace("/[^0-9]/", '',$request->obj_price_square);
                    $object->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                    $object->surcharge =  preg_replace("/[^0-9]/", '',$request->obj_doplata);
                    $object->geo = $request->obj_geo;
                    $object->spec_offer_span_1 = (isset($request->spec_offer_span_1)? $request->spec_offer_span_1 : null);
                    $object->spec_offer_span_2 = (isset($request->spec_offer_span_2)? $request->spec_offer_span_2 : null);
                    $object->spec_offer = (isset($request->spec_offer)? 1 : null);
                    $client = new \stdClass;
                    $client->name = $request->client_name;
                    $client->family = $request->client_family;
                    $client->father_name = $request->client_father_name;
                    $client->place = $request->client_place;
                    $client->date = $request->client_date;
                    $client->phone = $request->client_phone;
                    $client->mail = $request->client_mail;
                    $client->pasport = $request->client_pasport;
                    $client->pasport_who_take = $request->client_pasport_who_take;
                    $client->pasport_date = $request->client_pasport_date;
                    $client->need = $request->client_need;
                    $object->client = json_encode($client, JSON_UNESCAPED_UNICODE);
                    if($object->update()) {
                        $comforts = $this->c_rep->getComfortsId($request->comfort);
                        if($comforts) {
                            $object->comforts()->sync($comforts);
                        } else {
                            $object->comforts()->detach();
                        }
                        $object->alias = $this->getAlias($object);
                        $object->update();
                        return ['status' => 'Объект обновлен'];
                    }
                    break;
                case "3":
                    $object->deal = $request->obj_deal;
                    $object->type = $request->obj_form_3;
                    $object->city = $request->obj_city;
                    $object->area = $request->input($obj_area_input);
                    $object->address = $request->obj_address;
                    $object->rooms = $request->obj_room;
                    $object->floor = $request->obj_floor;
                    $object->square = $request->obj_square;
                    $object->square_kitchen = $request->obj_square_kitchen;
                    $object->square_life = $request->obj_square_life;
                    $object->build_type = $request->obj_build_type_1;
                    $object->build_floors = $request->obj_home_floors_1;
                    $object->desc = $request->obj_desc;
                    $object->comment = $request->obj_comment;
                    $object->price_square =  preg_replace("/[^0-9]/", '',$request->obj_price_square);
                    $object->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                    $object->surcharge =  preg_replace("/[^0-9]/", '',$request->obj_doplata);
                    $object->geo = $request->obj_geo;
                    $object->spec_offer_span_1 = (isset($request->spec_offer_span_1)? $request->spec_offer_span_1 : null);
                    $object->spec_offer_span_2 = (isset($request->spec_offer_span_2)? $request->spec_offer_span_2 : null);
                    $object->spec_offer = (isset($request->spec_offer)? 1 : null);
                    $client = new \stdClass;
                    $client->name = $request->client_name;
                    $client->family = $request->client_family;
                    $client->father_name = $request->client_father_name;
                    $client->place = $request->client_place;
                    $client->date = $request->client_date;
                    $client->phone = $request->client_phone;
                    $client->mail = $request->client_mail;
                    $client->pasport = $request->client_pasport;
                    $client->pasport_who_take = $request->client_pasport_who_take;
                    $client->pasport_date = $request->client_pasport_date;
                    $client->need = $request->client_need;
                    $object->client = json_encode($client, JSON_UNESCAPED_UNICODE);
                    if($object->update()) {
                        $comforts = $this->c_rep->getComfortsId($request->comfort);
                        if($comforts) {
                            $object->comforts()->sync($comforts);
                        } else {
                            $object->comforts()->detach();
                        }
                        $object->alias = $this->getAlias($object);
                        $object->update();
                        return ['status' => 'Объект обновлен'];
                    }
                    break;
                default: break;
            }
        } else {
            return array('error' => 'Нет данных');
        }
    }

    public function getAlias($object) {
        switch ($object->category) {
            case "1": $title = $object->rooms."-к квартира ".$object->square." м ".$object->floor."-".$object->build_floors." эт. ".$object->id;
                      return $this->transliterate($title);
                break;
            case "2": $title = $object->type." ".$object->home_square." м на участке ".$object->earth_square." сот. ".$object->id;
                return $this->transliterate($title);
                break;
            case "3":   $title = "комната ".$object->square." м  в ".$object->rooms."-к ".$object->floor."-".$object->build_floors." эт. ".$object->id;
                return $this->transliterate($title);
                break;
            default:
                break;
        }
    }

    public function getScope($scope, $request = false, $count = false, $order = ["created_at", "desc"], $pagination = 50) {
        if ($order == "pricedesc") {
            $order = array("price", "desc");
        } 
        switch ($scope) {
            case "my":
                if (Input::has("search")) {
                    $data = Input::except("search");
                    if ($count) {
                        $result = $this->model->My()->count();
                    } else {
                        if (is_array($order)) {
                            $query = $this->model->My()->orderBy($order[0], $order[1]);
                            $result = $this->searchObject($data, $pagination, $query);
                        } else {
                            $query = $this->model->My()->orderBy($order);
                            $result = $this->searchObject($data, $pagination, $query);
                        }
                    }
                } else {
                    if ($count) {
                        $result = $this->model->My()->count();
                    } else {
                        if (is_array($order)) {
                            $result = $this->model->My()->orderBy($order[0], $order[1])->paginate($pagination);
                        } else {
                            $result = $this->model->My()->orderBy($order)->paginate($pagination);
                        }
                    }
                }
                break;
            case "inwork":
                if (Input::has("search")) {
                    $data = Input::except("search");
                    if ($count) {
                        $result = $this->model->InWork()->count();
                    } else {
                        if (is_array($order)) {
                            $query = $this->model->InWork()->orderBy($order[0], $order[1]);
                            $result = $this->searchObject($data, $pagination, $query);
                        } else {
                            $query = $this->model->InWork()->orderBy($order);
                            $result = $this->searchObject($data, $pagination, $query);
                        }
                    }
                } else {
                    if ($count) {
                        $result = $this->model->InWork()->count();
                    } else {
                        if (is_array($order)) {
                            $result = $this->model->InWork()->orderBy($order[0], $order[1])->paginate($pagination);
                        } else {
                            $result = $this->model->InWork()->orderBy($order)->paginate($pagination);
                        }
                    }
                }
                break;
            case "prework":
                if (Input::has("search")) {
                    $data = Input::except("search");
                    if ($count) {
                        $result = $this->model->InPreWork()->count();
                    } else {
                        if (is_array($order)) {
                            $query = $this->model->InPreWork()->orderBy($order[0], $order[1]);
                            $result = $this->searchObject($data, $pagination, $query);
                        } else {
                            $query = $this->model->InPreWork()->orderBy($order);
                            $result = $this->searchObject($data, $pagination, $query);
                        }
                    }
                } else {
                    if ($count) {
                        $result = $this->model->InPreWork()->count();
                    } else {
                        if (is_array($order)) {
                            $result = $this->model->InPreWork()->orderBy($order[0], $order[1])->paginate($pagination);
                        } else {
                            $result = $this->model->InPreWork()->orderBy($order)->paginate($pagination);
                        }
                    }
                }
                break;
            case "completed":
                if (Input::has("search")) {
                    $data = Input::except("search");
                    if ($count) {
                        $result = $this->model->Completed()->count();
                    } else {
                        if (is_array($order)) {
                            $query = $this->model->Completed()->orderBy($order[0], $order[1]);
                            $result = $this->searchObject($data, $pagination, $query);
                        } else {
                            $query = $this->model->Completed()->orderBy($order);
                            $result = $this->searchObject($data, $pagination, $query);
                        }
                    }
                } else {
                    if ($count) {
                        $result = $this->model->Completed()->count();
                    } else {
                        if (is_array($order)) {
                            $result = $this->model->Completed()->orderBy($order[0], $order[1])->paginate($pagination);
                        } else {
                            $result = $this->model->Completed()->orderBy($order)->paginate($pagination);
                        }
                    }
                }
                break;
            case "deleted":
                if (Input::has("search")) {
                    $data = Input::except("search");
                    if ($count) {
                        $result = $this->model->onlyTrashed()->count();
                    } else {
                        if (is_array($order)) {
                            $query = $this->model->onlyTrashed()->orderBy($order[0], $order[1]);
                            $result = $this->searchObject($data, $pagination, $query);
                        } else {
                            $query = $this->model->onlyTrashed()->orderBy($order);
                            $result = $this->searchObject($data, $pagination, $query);
                        }
                    }
                } else {
                    if ($count) {
                        $result = $this->model->onlyTrashed()->count();
                    } else {
                        if (is_array($order)) {
                            $result = $this->model->onlyTrashed()->orderBy($order[0], $order[1])->paginate($pagination);
                        } else {
                            $result = $this->model->onlyTrashed()->orderBy($order)->paginate($pagination);
                        }
                    }
                }
                break;
            case "default":
                if (Input::has("search")) {
                    $data = Input::except("search");
                    if ($count) {
                        $result = $this->get("*", false, false, false, true);
                    } else {
                        if (is_array($order)) {
                            $query = $this->model->select("*")->orderBy($order[0], $order[1]);
                            $result = $this->searchObject($data, $pagination, $query);
                        } else {
                            $query = $this->model->select("*")->orderBy($order);
                            $result = $this->searchObject($data, $pagination, $query);
                        }
                    }
                } else {
                    if ($count) {
                        $result = $this->get("*", false, false, false, true);
                    } else {
                        // FIXME: НЕ РАБОТАЕТ СОРТИРОВАКА
                        $result = $this->get("*", false, $pagination, false, false, $order);
                    }
                }
                break;
            default: abort(404);
                break;
        }        
        return $result;
    }

    private function searchObject($data, $pagination, $query) {
        switch ($data["category"]) {
            case "1": $square_min = ($data["square_1_min"] == 10)? 1: $data["square_1_min"];
                $square_max = ($data["square_1_max"] == 200)? 99999999: $data["square_1_max"];
                $floor_min = ($data["floor_min"] == 1)? 1: $data["floor_min"];
                $floor_max = ($data["floor_max"] == 31)? 99999: $data["floor_max"];
                $floorInObj_min = ($data["floorInObj_1_min"] == 1)? 1: $data["floorInObj_1_min"];
                $floorInObj_max = ($data["floorInObj_1_max"] == 31)? 999: $data["floorInObj_1_max"];
                $price_min = ($data["price_min"]== 0)? 1: $data["price_min"];
                $price_max = ($data["price_max"]== 0)? 999999999: $data["price_max"];
                $query->whereCategory($data["category"]);
                if (isset($data["deal"])) {
                    $query->whereDeal($data["deal"]);
                }
                if (isset($data["formObj_1"])) {
                    $query->whereType($data["formObj_1"]);
                }
                if (isset($data["city"])) {
                    $query->whereCity($data["city"]);
                }
                if (isset($data["area".$data["city"]])) {
                    $query->whereIn("area", $data["area".$data["city"]]);
                }
                if (isset($data["typeHouse_1"])) {
                    $query->whereIn("build_type", $data["typeHouse_1"]);
                }
                if (isset($data["room"])) {
                    $query->whereIn("rooms", $data["room"]);
                }      
                if (isset($data["address"])) {
                    $words = mb_strtolower($data["address"]);
                    $words = trim($words);
                    $words = quotemeta($words);
                    $arraywords = explode(" " ,$words);
                    $count = 1;
                    foreach ($arraywords as $word) {
                        if ($count > 1) {
                            $query->orWhere("address", "LIKE", "%$word%");
                        } else {
                            $query->where("address", "LIKE", "%$word%");
                        }
                    }
                }
                $query->where("square", ">=", "$square_min");
                $query->where("square", "<=", "$square_max");
                $query->where("floor", ">=", "$floor_min");
                $query->where("floor", "<=", "$floor_max");
                $query->where("build_floors", ">=", "$floorInObj_min");
                $query->where("build_floors", "<=", "$floorInObj_max");
                $query->where("price", ">=", "$price_min");
                $query->where("price", "<=", "$price_max");      
                break;
            case "2":   $square_min = ($data["square_2_min"] == 10)? 1: $data["square_2_min"];
                $square_max = ($data["square_2_max"] == 500)? 999999999: $data["square_2_max"];
                $square_earth_min = ($data["square_earth_min"] == 1)? 1: $data["square_earth_min"];
                $square_earth_max = ($data["square_earth_max"] == 100)? 9999: $data["square_earth_max"];
                $floorInObj_min = ($data["floorInObj_2_min"] == 1)? 1: $data["floorInObj_2_min"];
                $floorInObj_max = ($data["floorInObj_2_max"] == 5)? 99999: $data["floorInObj_2_max"];
                $distance_min = ($data["distance_min"] == 0)? -1: $data["distance_min"];
                $distance_max = ($data["distance_max"] == 100)? 99999: $data["distance_max"];
                $price_min = ($data["price_min"]== 0)? 1: $data["price_min"];
                $price_max = ($data["price_max"]== 0)? 999999999: $data["price_max"];
                $query->whereCategory($data["category"]);
                if (isset($data["deal"])) {
                    $query->whereDeal($data["deal"]);
                }
                if (isset($data["formObj_2"])) {
                    $query->whereIn("type", $data["formObj_2"]);
                }
                if (isset($data["city"])) {
                    $query->whereCity($data["city"]);
                }
                if (isset($data["area".$data["city"]])) {
                    $query->whereIn("area", $data["area".$data["city"]]);
                }
                if (isset($data["typeHouse_2"])) {
                    $query->whereIn("build_type", $data["typeHouse_2"]);
                }
                if (isset($data["address"])) {
                    $words = mb_strtolower($data["address"]);
                    $words = trim($words);
                    $words = quotemeta($words);
                    $arraywords = explode(" " ,$words);
                    $count = 1;
                    foreach ($arraywords as $word) {
                        if ($count > 1) {
                            $query->orWhere("address", "LIKE", "%$word%");
                        } else {
                            $query->where("address", "LIKE", "%$word%");
                        }
                    }
                }
                $query->where("home_square", ">=", "$square_min");
                $query->where("home_square", "<=", "$square_max");
                $query->where("earth_square", ">=", "$square_earth_min");
                $query->where("earth_square", "<=", "$square_earth_max");
                $query->where("distance", ">=", "$distance_min");
                $query->where("distance", "<=", "$distance_max");
                $query->where("build_floors", ">=", "$floorInObj_min");
                $query->where("build_floors", "<=", "$floorInObj_max");
                $query->where("price", ">=", "$price_min");
                $query->where("price", "<=", "$price_max");
                break;
            case "3":   $square_min = ($data["square_1_min"] == 10)? 1: $data["square_1_min"];
                $square_max = ($data["square_1_max"] == 200)? 99999999: $data["square_1_max"];
                $floor_min = ($data["floor_min"] == 1)? 1: $data["floor_min"];
                $floor_max = ($data["floor_max"] == 31)? 99999: $data["floor_max"];
                $floorInObj_min = ($data["floorInObj_1_min"] == 1)? 1: $data["floorInObj_1_min"];
                $floorInObj_max = ($data["floorInObj_1_max"] == 31)? 999: $data["floorInObj_1_max"];
                $price_min = ($data["price_min"]== 0)? 1: $data["price_min"];
                $price_max = ($data["price_max"]== 0)? 999999999: $data["price_max"];
                $query->whereCategory($data["category"]);
                if (isset($data["deal"])) {
                    $query->whereDeal($data["deal"]);
                }
                if (isset($data["formObj_3"])) {
                    $query->whereType($data["formObj_3"]);
                }
                if (isset($data["city"])) {
                    $query->whereCity($data["city"]);
                }
                if (isset($data["area".$data["city"]])) {
                    $query->whereIn("area", $data["area".$data["city"]]);
                }
                if (isset($data["typeHouse_1"])) {
                    $query->whereIn("build_type", $data["typeHouse_1"]);
                }
                if (isset($data["room"])) {
                    $query->whereIn("rooms", $data["room"]);
                }
                if (isset($data["address"])) {
                    $words = mb_strtolower($data["address"]);
                    $words = trim($words);
                    $words = quotemeta($words);
                    $arraywords = explode(" " ,$words);
                    $count = 1;
                    foreach ($arraywords as $word) {
                        if ($count > 1) {
                            $query->orWhere("address", "LIKE", "%$word%");
                        } else {
                            $query->where("address", "LIKE", "%$word%");
                        }
                    }
                }
                $query->where("square", ">=", "$square_min");
                $query->where("square", "<=", "$square_max");
                $query->where("floor", ">=", "$floor_min");
                $query->where("floor", "<=", "$floor_max");
                $query->where("build_floors", ">=", "$floorInObj_min");
                $query->where("build_floors", "<=", "$floorInObj_max");
                $query->where("price", ">=", "$price_min");
                $query->where("price", "<=", "$price_max");
                break;
            default:
                break;
        }
        return $query->paginate($pagination);
    }

    public function getObjImage($object) {
        switch ($object->category) {
            case "1": $image = ($object->rooms > 5) ? "flat-6.svg" : "flat-".$object->rooms.".svg";
                break;
            case "2": $image = "house.svg";
                break;
            case "3": $image = "room.svg";
                break;
            default: $image = "";
                break;
        }
        return $image;
    }

    public function getTitle($object) {
        switch ($object->category) {
            case "1": $title = $object->rooms."-к квартира ".$object->square." м² ".$object->floor."/".$object->build_floors." эт.";
                break;
            case "2": $title = $object->type." ".$object->home_square." м² на участке ".$object->earth_square." сот.";
                break;
            case "3": $title = "Комната ".$object->square." м²  в ".$object->rooms."-к ".$object->floor."/".$object->build_floors." эт.";
                break;
            default: $title = "";
                break;
        }
        return $title;
    }
}

?>