<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
   //prevenir rutas si estas logout
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function save(Request $request){
        
        //validacion
        $validate=$this->validate($request,[
            'image_id'=>'integer|required',
            'content' => 'string|required'
        ]);
        
        //recoger datos
        
        $user=\Auth::user();
        
        $image_id=$request->input('image_id');
        $content=$request->input('content');
        
        //asignar los valores al objeto al guardar
        $comment = new Comment();
        $comment->user_id =$user->id;
        $comment->image_id =$image_id;
        $comment->content=$content;
        
        //guardar comentarios 
        $comment->save();
        
        //redireccion al finalizar
        return redirect()->route('image.detail',['id' => $image_id])
                         ->with([
                             'message' => 'Has publicado el comentario correctamente'
                         ]);
        
        
    }
    
    public function delete($id)
    {
        //recoger los datos del usuario identificado 
        $user = \Auth::user();
        
        //conseguir los datos del objeto del comentario
        $comment=Comment::find($id);
        
        //Comprobar si soy el dueño del comentario o de la publicacion
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id))
        {
            $comment -> delete();
             return redirect()->route('image.detail',['id' => $comment->image->id])
                         ->with([
                             'message' => 'Comentario borrado!!'
                         ]);
        }else{
            return redirect()->route('image.detail',['id' => $comment->image->id])
                         ->with([
                             'message' => 'El commentario no se ha borrado!!'
                         ]);
        }
    }
    
}
