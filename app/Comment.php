<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Establecemoslatablaasociadaalmodelo
    protected $table='comments';
    //DefinimoslarelaciónOneToManyconlatabla'images'
    
    public function image(){
    //EstemétododevuelveelobjetoImagendelquesehahechoelcomentario
    return$this->belongsTo('App\Image','image_id');
    }
    //DefinimoslarelaciónOneToManyconlatabla'users'
    public function user(){
    //EstemétododevuelveelobjetoUsuarioquehahechoelcomentario
    return$this->belongsTo('App\User','user_id');

    }
}
