<?php

namespace App\Repositories;

use App\Object;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ImagesRepository;
use App\Repositories\ComfortsRepository;
use Gate;

class ObjectsRepository extends Repository {

    protected $i_rep;
    protected $c_rep;

    public function __construct(Object $object, ImagesRepository $i_rep, ComfortsRepository $c_rep) {
        $this->model = $object;
        $this->i_rep = $i_rep;
        $this->c_rep = $c_rep;

    }

    public function addObject($request) {
        if ($request->has("obj_type")) {
            $obj_type = $request->obj_type;
            $obj_area_input = "obj_area" . $request->obj_city;
            $user = Auth::user();
            $temp_obj_id = $request->obj_id;
            switch ($obj_type) {
                case "1" :  $this->model->category = $request->obj_type;
                $this->model->deal = $request->obj_deal;
                $this->model->type = $request->obj_form_1;
                $this->model->city = $request->obj_city;
                $this->model->area = $request->input($obj_area_input);
                $this->model->address = $request->obj_address;
                $this->model->rooms = $request->obj_room;
                $this->model->floor = $request->obj_floor;
                $this->model->square = $request->obj_square;
                $this->model->build_type = $request->obj_build_type_1;
                $this->model->build_floors = $request->obj_home_floors_1;
                $this->model->desc = $request->obj_desc;
                $this->model->comment = $request->obj_comment;
                $this->model->price_square =  preg_replace("/[^0-9]/", '',$request->obj_price_square);
                $this->model->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                $this->model->surcharge =  preg_replace("/[^0-9]/", '',$request->obj_doplata);
                $this->model->geo = $request->obj_geo;
                $this->model->created_id = $user->id;
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
                case "2":   $this->model->category = $request->obj_type;
                    $this->model->deal = $request->obj_deal;
                    $this->model->type = $request->obj_form_2;
                    $this->model->city = $request->obj_city;
                    $this->model->area = $request->input($obj_area_input);
                    $this->model->address = $request->obj_address;
                    $this->model->home_square = $request->obj_house_square;
                    $this->model->build_type = $request->obj_build_type_2;
                    $this->model->build_floors = $request->obj_home_floors_2;
                    $this->model->distance = $request->obj_distance;
                    $this->model->earth_square = $request->obj_earth_square;
                    $this->model->desc = $request->obj_desc;
                    $this->model->comment = $request->obj_comment;
                    $this->model->price_square =  preg_replace("/[^0-9]/", '',$request->obj_price_square);
                    $this->model->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                    $this->model->surcharge =  preg_replace("/[^0-9]/", '',$request->obj_doplata);
                    $this->model->geo = $request->obj_geo;
                    $this->model->created_id = $user->id;
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
                case "3":   $this->model->category = $request->obj_type;
                    $this->model->deal = $request->obj_deal;
                    $this->model->type = $request->obj_form_3;
                    $this->model->city = $request->obj_city;
                    $this->model->area = $request->input($obj_area_input);
                    $this->model->address = $request->obj_address;
                    $this->model->rooms = $request->obj_room;
                    $this->model->floor = $request->obj_floor;
                    $this->model->square = $request->obj_square;
                    $this->model->build_type = $request->obj_build_type_1;
                    $this->model->build_floors = $request->obj_home_floors_1;
                    $this->model->desc = $request->obj_desc;
                    $this->model->comment = $request->obj_comment;
                    $this->model->price_square =  preg_replace("/[^0-9]/", '',$request->obj_price_square);
                    $this->model->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                    $this->model->surcharge =  preg_replace("/[^0-9]/", '',$request->obj_doplata);
                    $this->model->geo = $request->obj_geo;
                    $this->model->created_id = $user->id;
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
                    $object->build_type = $request->obj_build_type_1;
                    $object->build_floors = $request->obj_home_floors_1;
                    $object->desc = $request->obj_desc;
                    $object->comment = $request->obj_comment;
                    $object->price_square =  preg_replace("/[^0-9]/", '',$request->obj_price_square);
                    $object->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                    $object->surcharge =  preg_replace("/[^0-9]/", '',$request->obj_doplata);
                    $object->geo = $request->obj_geo;
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
                    $object->build_type = $request->obj_build_type_1;
                    $object->build_floors = $request->obj_home_floors_1;
                    $object->desc = $request->obj_desc;
                    $object->comment = $request->obj_comment;
                    $object->price_square =  preg_replace("/[^0-9]/", '',$request->obj_price_square);
                    $object->price =  preg_replace("/[^0-9]/", '',$request->obj_price);
                    $object->surcharge =  preg_replace("/[^0-9]/", '',$request->obj_doplata);
                    $object->geo = $request->obj_geo;
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

    public function getScope($scope, $parameters = false, $count = false, $order = "created_at", $pagination = 50) {
        if ($order == "pricedesc") {
            $order = array("price", "desc");
        } 
        switch ($scope) {
            case "my":
                if($count) {
                    $result = $this->model->My()->count();
                } else {
                    if (is_array($order)) {
                     $result = $this->model->My()->orderBy($order[0], $order[1])->paginate($pagination); 
                    } else {
                     $result = $this->model->My()->orderBy($order)->paginate($pagination);  
                    }
                }
                break;
            case "inwork":
                if($count) {
                    $result = $this->model->InWork()->count();
                } else {
                    if (is_array($order)) {
                        $result = $this->model->InWork()->orderBy($order[0], $order[1])->paginate($pagination);
                    } else {
                        $result = $this->model->InWork()->orderBy($order)->paginate($pagination);
                    }
                }
                break;
            case "prework":
                if($count) {
                    $result = $this->model->InPreWork()->count();
                } else {
                    if (is_array($order)) {
                        $result = $this->model->InPreWork()->orderBy($order[0], $order[1])->paginate($pagination);
                    } else {
                        $result = $this->model->InPreWork()->orderBy($order)->paginate($pagination);
                    }
                }
                break;
            case "completed":
                if($count) {
                    $result = $this->model->Completed()->count();
                } else {
                    if (is_array($order)) {
                        $result = $this->model->Completed()->orderBy($order[0], $order[1])->paginate($pagination);
                    } else {
                        $result = $this->model->Completed()->orderBy($order)->paginate($pagination);
                    }
                }
                break;
            case "deleted":
                if($count) {
                    $result = $this->model->onlyTrashed()->count();
                } else {
                    if (is_array($order)) {
                        $result = $this->model->onlyTrashed()->orderBy($order[0], $order[1])->paginate($pagination);
                    } else {
                        $result = $this->model->onlyTrashed()->orderBy($order)->paginate($pagination);
                    }
                }
                break;
            case "default":
                if($count) {
                    $result = $this->get("*", false, false, false, true);
                } else {
                    $result = $this->get("*", false, $pagination, false, false, $order);
                }
                break;
            default: abort(404);
                break;
        }        
        return $result;
    }
}

?>