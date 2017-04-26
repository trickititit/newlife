<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Photo;
use App\Image;
use App\Repositories\ImagesRepository;
use App\Repositories\ObjectsRepository;
use Illuminate\Support\Facades\Auth;

class Storage extends Controller
{

    public function objUploadImage(Request $request, ObjectsRepository $o_rep)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $storeFolder = public_path() . '\\' . config('settings.theme') . '\uploads\images\\';   //2
                $user = Auth::user();
                $hashed = md5($user->email);
                $data = $request->except('_token','image');
                $obj_id = $data["obj_id"];
                $tmp_img = $data["tmp_img"];
                if ($tmp_img == 1){
                    $uploadDir = $storeFolder.$hashed."-".$obj_id."\\";
                } else {
                    $uploadDir = $storeFolder.$obj_id."\\";
                }
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir);
                }
                $img = Photo::make($image);
                $img_type = $this->getTypeImg($img->mime());
                if($img_type == ".err") {
                    return false;
                }
                $str = str_random(8);
                $image_path = $str . $img_type;

                $img_model = new Image;
                $img_model->type = $img_type;
                $img_model->src_folder = $uploadDir;
                $img_model->org_name = $image->getClientOriginalName();
                $img_model->new_name = $image_path;
                if($tmp_img == 1) {
                    $img_model->temp = 1;
                    $img_model->temp_object_id = $obj_id;
                } else {
                    $img_model->temp = 0;
                    $img_model->object_id = $obj_id;
                }
                $img_model->save();

                $img->fit(500, 500)->save($uploadDir ."/". $image_path);
            }

        }
    }

    public function objGetImage(Request $request) {
            $result = array();
            $obj_id = $request['objid'];
            $scandir = public_path() . '/' . config('settings.theme') . '/uploads/images/'.$obj_id."/";
            $files = scandir($scandir);                 //1
            if (false !== $files) {
                foreach ($files as $file) {
                    if ('.' != $file && '..' != $file && !preg_match("/^thumb-.*/", $file)) {       //2
                        $obj['name'] = $file;
                        $obj['size'] = filesize($scandir . $file);
                        $result[] = $obj;
                    }
                }
            }
            return \Response::json($result);
    }
    
    public function objDeleteImage(Request $request, ImagesRepository $i_rep) {
        if ($request->has('file')) {
            $filename = $request['file'];
            $obj_id = $request['obj_id'];
            $tmp_img = $request['tmp_img'];
            if ($tmp_img == 1){
                $images = $i_rep->getTmpImg($obj_id);
            } else {
                $images = $i_rep->get("*",false, false, ["object_id", $obj_id]);
            }
            foreach ($images as $image) {
                if ($image->org_name == $filename) {
                    $filename = $image->new_name;
                    $image_id = $image->id;
                    $uploadDir = $image->src_folder;
                } else if ($image->new_name == $filename) {
                    $image_id = $image->id;
                    $uploadDir = $image->src_folder;
                }
            }
            $del_image = $i_rep->destroy($image_id);
            if (!$del_image) {
                return false;
            }
            unlink($uploadDir.$filename);
//            unlink($uploadDir."/". "thumb-". $filename);
        }
    }

    private function getTypeImg($mime) {
        if ($mime == "image/gif") {
            return ".gif";
        } else if ($mime == "image/jpeg") {
            return ".jpg";
        } else if ($mime == "image/png") {
            return ".png";
        } else {
            return ".err";
        }

    }
}