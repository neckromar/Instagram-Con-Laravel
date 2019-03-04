<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //Establecemoslatablaasociadaalmodelo
    protected $table ='likes';
    //DefinimoslarelaciónOneToManyconlatabla'images'
    public function image()
    {
    //EstemétododevuelveelobjetoImagendelquesehahechoelLike
    return $this-> belongsTo('App\Image','image_id');
    }
    //DefinimoslarelaciónOneToManyconlatabla'users'
    public function user()
    {
    //EstemétododevuelveelobjetoUsuarioquehahechoelLike
    return $this-> belongsTo('App\User','user_id');
    }
}
