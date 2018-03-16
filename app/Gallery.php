<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function getCreateedAttribute($value){
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

//    public function imageGallery(){
//        return $this->hasOne('App\File');
//    }
}
