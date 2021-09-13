<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\User;
use App\Video;
use App\Comment;

class UserController extends Controller
{
    //Obtenemos el usuario y enviamos los datos a la vista chanels
    public function channel($user_id)
    {
    	$user = User::find($user_id);
    	$videos = Video::where('user_id', $user_id)->paginate(3);

    	if (!is_object($user)) 
    	{
    		return redirect()->route('home');
    	}

    	return view('users.channel', array
    	(
    		'user' => $user,
    		'videos' => $videos
    	));
    }
}
