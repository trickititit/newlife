<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Object extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at', "activate_at", "created_at", "updated_at"];
    
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

    public function getViewPrice() {
        return number_format($this->price, 0, '', ' ');
    }

    public function preworkingUser() {
        return $this->belongsTo('App\User', 'pre_working_id');
    }

    public function createdUser() {
        return $this->belongsTo('App\User', 'created_id');
    }

    public function workingUser() {
        return $this->belongsTo('App\User', 'working_id');
    }

    public function deletedUser() {
        return $this->belongsTo('App\User', 'deleted_id');
    }

    public function completedUser() {
        return $this->belongsTo('App\User', 'completed_id');
    }

    public function scopeMy($query) {
        $user_id = Auth::user()->id;
        return $query->whereCreated_id($user_id)->whereCompleted_id(null);
    }

    public function scopeInWork($query) {
        $user_id = Auth::user()->id;
        return $query->whereWorking_id($user_id)->whereCompleted_id(null);
    }

    public function scopeInPreWork($query) {
        return $query->wherenotNull("pre_working_id");
    }

    public function scopeCompleted($query) {
        $user_id = Auth::user()->id;
        return $query->whereCompleted_id($user_id);
    }

    public function scopeSpecOffer ($query) {
        return $query->whereSpec_offer(1);
    }
    
}
