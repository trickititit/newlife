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
                        $this->model->comforts()->attach($comforts);
                        return ['status' => 'Материал добавлен'];
                    }
                break;
                case "2":   $this->model->category = $request->obj_type;
                    $this->model->deal = $request->obj_deal;
                    $this->model->type = $request->obj_form_2;
                    $this->model->city = $request->obj_city;
                    $this->model->area = $request->input($obj_area_input);
                    $this->model->address = $request->obj_address;
                    $this->model->square = $request->obj_square;
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
                        $this->model->comforts()->attach($comforts);
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
                        $this->model->comforts()->attach($comforts);
                        return ['status' => 'Материал добавлен'];
                    }
                break;
                default: break;
            }
        } else {
            return array('error' => 'Нет данных');
        }

    }
}

?>