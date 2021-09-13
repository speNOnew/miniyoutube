<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;

class CommentController extends Controller
{
    //Funcion que permite cargar el comentario y ser registrado
    public function store(Request $request)
    {
    	// Validamos el formulario
    	$validate = $this->validate($request, [ 'body' => 'required' ]);
    	// Obtenemos el usuario
    	$user = \Auth::user();
    	// Creamos el objeto
    	$comment = new Comment();
    	// Obtenemos los datos del formulario para guardalos
    	$comment->user_id = $user->id;
    	$comment->video_id = $request->input('video_id');
    	$comment->body = $request->input('body');
    	// Guardamos los datos del formulario
    	$comment->save();
    	// Devolvemos los datos a la pagina
    	return redirect()->route('videoDetail', [ 'video_id' => $comment->video_id ])->with(array('message' => 'Comentario creado con éxito'));
    }

    //Funcion que permite elminiar fisicamente el comentario seleccionado de la pagina
    public function delete($comment_id)
    {
        //Validamos que el usuario logueado sea el usuario creador del comentario para que lo pueda eliminar
    	$user = \Auth::user();
    	$comment = Comment::find($comment_id);
        //Comparamos los datos
    	if ($user && ($comment->user_id == $user->id || $comment->video->user_id == $user->id)) 
    	{
    		$comment->delete();
    	}
        //Redireccionamos al video con un mensaje exitoso
    	return redirect()->route('videoDetail', [ 'video_id' => $comment->video_id ])->with(array('message'=> 'Comentario eliminado con éxito'));
    }
}
