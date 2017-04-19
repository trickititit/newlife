<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    //
    
    public function comforts(){
        return $this->belongsToMany('App\Comfort');
    }

    public function raion() {
        return $this->belongsTo('App\Area', 'area');
    }

    public function gorod() {
        return $this->belongsTo('App\City', 'city');
    }
    
    public function images() {
        return $this->hasMany('App\Image');
    }
    
}
