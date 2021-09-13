<?php

//Rutas del controlador de videos

//Cargar datos del video
Route::get('/crearvideo', array
(
	'as' => 'createVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@createVideo'
));

//Guardar video en base de datos
Route::post('/guardarvideo', array
(
	'as' => 'saveVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@saveVideo'
));

//Mostrar imagenes de miniatura del video
Route::get('/miniatura/{filename}', array
(
	'as' => 'imageVideo',
	'uses' => 'VideoController@getImage'
));

//Ir a la pagina del video
Route::get('/video/{video_id}', array
(
	'as' => 'videoDetail',
	'uses' => 'VideoController@getVideoDetail'
));

//Cargar video en la pagina
Route::get('/videofile/{filename}', array
(
	'as' => 'videoFile',
	'uses' => 'VideoController@getVideo'

));

//Eliminar videos
Route::get('delete-video/{video_id}', array
(
	'as' => 'videoDelete',
	'middleware' => 'auth',
	'uses' => 'VideoController@delete'
));

//Editar video
Route::get('/edit-video/{video_id}', array
(
	'as' => 'videoEdit',
	'middleware' => 'auth',
	'uses' => 'VideoController@edit'
));

//Actualizar video
Route::post('/update-video/{video_id}', array
(
	'as' => 'updateVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@update'
));

//Buscar video
Route::get('/buscar/{sarch?}/{filter?}', array
(
	'as' => 'videoSearch',
	'uses' => 'VideoController@search'
));

// Rutas del controlador de comentarios

// Cargar comentarios
Route::post('/nuevo-comentario', array
(
	'as' => 'comment',
	'middleware' => 'auth',
	'uses' => 'CommentController@store'
));

// Eliminar comentario
Route::get('/delete-comment/{comment_id}', array
(
	'as' => 'commentDelete',
	'middleware' => 'auth',
	'uses' => 'CommentController@delete'
));

// *** Otras rutas ***

//Canal de usuario
Route::get('/canal/{user_id}', array
(
	'as' => 'channel',
	'uses' => 'UserController@channel'
));

// Redirección a la home
Route::get('/', array
(
	'as' => 'home',
	'uses' => 'HomeController@index'
));

//Redirecciones del sistema de registro y login
Route::auth();