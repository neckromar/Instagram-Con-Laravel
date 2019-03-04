<?php

use App\Image;

/*
    Route::get('/',function(){
        
    $images=Image::all();
    
    foreach($images as $image){
    echo $image->image_path ."<br/>";
    echo $image->description ."<br/>";
    echo $image->user->name .''. $image->user->surname;
    //Añadimosunbuclepararecorrerloscomentariosdela
    //imagenmostrandoelnombreyapellidosdequienlorealizó
    if(count($image->comments)>=1){
    echo '<br/>'.'<strong>Comentarios</strong>';
    echo '<ul>';
    foreach($image->comments as $comment){
    echo '<li>';
    echo$comment->user->name . ' ' . $comment->user->surname .':';
    echo$comment->content;
    echo'</li>';
    }
    echo'</ul>';
    }
    echo"<hr/>";
    }
    die();
    return view('welcome');
});
*/

Auth::routes();

//rutas generales
Route::get('/', 'HomeController@index')->name('home');

//Rutas Usuarios




Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/perfil/{id}', 'UserController@profile')->name('profile');
Route::get('/usuarios/{search?}', 'UserController@index')->name('user.index');

Route::get('/subir-imagen', 'ImageController@create')->name('image.create');
Route::post('/image/save', 'ImageController@save')->name('image.save');
Route::get('/image/file/{filename}', 'ImageController@getImage')->name('image.file');
Route::get('/imagen/{id}', 'ImageController@detail')->name('image.detail');
Route::get('/image/delete/{id}', 'ImageController@delete')->name('image.delete');
Route::get('/imagen/editar/{id}', 'ImageController@edit')->name('image.edit');
Route::post('/image/update', 'ImageController@update')->name('image.update');




Route::post('/comment/save', 'CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('likes');


