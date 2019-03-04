<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Establecemoslatablaasociadaalmodelo
    protected $table='images';
    //DefinimoslarelaciónOneToManyconlatabla'comments'
    public function comments(){
    //Métodoquedevuelveunarraydeobjetosconloscomentariosasociadosalaimagen
    return$this->hasMany('App\Comment')->orderBy('id', 'desc');
    }
    //DefinimoslarelaciónOneToManyconlatabla'likes'
    public function likes(){
        //Estemétododevuelveelarraydeobjetosconloslikesasociadosalaimagen
    return$this->hasMany('App\Like');
    }
    //DefinimoslarelaciónManyToOneconlatabla'users'
    public function user(){
    //EstemétododevuelveelobjetoUsuarioquehacreadolaimagen
    return$this->belongsTo('App\User','user_id');
    }
}
?>