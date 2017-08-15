<?php
/**
 * Created by PhpStorm.
 * User: Трик
 * Date: 10.08.2017
 * Time: 22:14
 */

namespace App\Repositories;
use App\Aobject;


class AobjectsRepository extends Repository
{

    public function __construct(Aobject $object) {
        $this->model = $object;
    }

    public function addObj($obj){
            if ($this->getOne($obj->id)) {
                return "one";
            } else {
                $this->model = new Aobject();
                switch ($obj->category) {
                    case "1":
                        $this->model->category = $obj->category;
                        $this->model->date = $obj->date;
                        $this->model->id = $obj->id;
                        $this->model->deal = $obj->deal;
                        $this->model->type = $obj->type;
                        $this->model->city = $obj->city;
                        $this->model->area = $obj->area;
                        $this->model->address = $obj->address;
                        $this->model->rooms = $obj->rooms;
                        $this->model->floor = $obj->floor;
                        $this->model->square = $obj->square;
                        $this->model->build_type = $obj->build_type;
                        $this->model->build_floors = $obj->build_floors;
                        $this->model->desc = $obj->desc;
                        $this->model->client_name = (($obj->contact_name != "none") ? $obj->contact_name : "") . " " . (($obj->person_name != "none") ? $obj->person_name : "");
                        $this->model->client_contacts = $obj->phone;
                        $this->model->price = $obj->price;
                        $this->model->link = $obj->url;
                        return $this->model->save();
                        break;
                    case "2":
                        $this->model->category = $obj->category;
                        $this->model->date = $obj->date;
                        $this->model->id = $obj->id;
                        $this->model->deal = $obj->deal;
                        $this->model->type = $obj->type;
                        $this->model->city = $obj->city;
                        $this->model->area = $obj->area;
                        $this->model->address = $obj->address;
                        $this->model->distance = $obj->distance;
                        $this->model->home_square = $obj->home_square;
                        $this->model->earth_square = $obj->earth_square;
                        $this->model->build_type = $obj->build_type;
                        $this->model->build_floors = $obj->build_floors;
                        $this->model->desc = $obj->desc;
                        $this->model->client_name = (($obj->contact_name != "none") ? $obj->contact_name : "") . " " . (($obj->person_name != "none") ? $obj->person_name : "");
                        $this->model->client_contacts = $obj->phone;
                        $this->model->price = $obj->price;
                        $this->model->link = $obj->url;
                        return $this->model->save();
                        break;
                    case "3":
                        $this->model->category = $obj->category;
                        $this->model->date = $obj->date;
                        $this->model->id = $obj->id;
                        $this->model->deal = $obj->deal;
                        $this->model->type = $obj->type;
                        $this->model->city = $obj->city;
                        $this->model->area = $obj->area;
                        $this->model->address = $obj->address;
                        $this->model->rooms = $obj->rooms;
                        $this->model->floor = $obj->floor;
                        $this->model->square = $obj->square;
                        $this->model->build_type = $obj->build_type;
                        $this->model->build_floors = $obj->build_floors;
                        $this->model->desc = $obj->desc;
                        $this->model->client_name = (($obj->contact_name != "none") ? $obj->contact_name : "") . " " . (($obj->person_name != "none") ? $obj->person_name : "");
                        $this->model->client_contacts = $obj->phone;
                        $this->model->price = $obj->price;
                        $this->model->link = $obj->url;
                        return $this->model->save();
                        break;
                    default:
                        break;
                }
            }
    }

    public function getOne($id) {
        $result = $this->model->where('id',$id)->first();
        return $result;
    }
}