<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Video;
use App\Comment;

class VideoController extends Controller
{
    //Carga la pagina del formulario para crear el video
    public function createVideo()
    {
    	return view('videos.createVideos');
    }
    //Registrar la informacion del video
    public function saveVideo(Request $request)
    {
    	//Valida el formulario
    	$validateData = $this->validate($request,
    	[
    		'title' => 'required',
    		'description' => 'required',
    		'video' => 'mimes:mp4'
    	]);
        //Almacena detalles del video
        $video = new Video();
        $user = \Auth::user();
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        //Almacena el miniatura
        $image = $request->file('image');
        if ($image) 
        {
            $image_path = time().'_'.$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $video->image = $image_path;
        }
        //Almacena el video
        $video_file = $request->file('video');
        if ($video_file) 
        {
            $video_file_path = time().'_'.$video_file->getClientOriginalName();
            \Storage::disk('videos')->put($video_file_path, \File::get($video_file));
            $video->video_path = $video_file_path;
        }
        //Guarda la informacion del video
        $video->save();
        return redirect()->route('home')->with(array
        (
            'message' => 'Video guardado exitosamente'
        ));
    }

    //Carga la miniatura del video
    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    //Carga los detalles del video
    public function getVideoDetail($video_id)
    {
        $video = Video::find($video_id);
        return view('videos.details', array
        (
            'video' => $video
        ));
    }

    //Carga el video
    public function getVideo($filename)
    {
        $file = Storage::disk('videos')->get($filename);
        return new Response($file, 200);
    }

    //Eliminar video
    public function delete($video_id)
    {
        //Obtenemos los datos de usuario, video y comentarios
        $user = \Auth::user();
        $video = Video::find($video_id);
        $comments = Comment::where('video_id', $video_id)->get();
        //Comparamos los datos de sesion con los del video para permitir borrar el registro
        if ($user && $video->user_id == $user->id)
        {
            //Eliminar comentarios
            foreach ($comments as $comment) 
            {
                $comment->delete();
            }
            //Eliminar miniatura
            Storage::disk('images')->delete($video->image);
            //Eliminar video
            Storage::disk('videos')->delete($video->video_path);
            //Eliminar registro
            $video->delete();
            $message = array('message' => 'Video eliminado correctamente');
        }
        else
        {
            $message = array('message' => 'No se pudo eliminar el video');
        }
        return redirect('')->with($message);
    }

    //Editar videos
    public function edit($video_id)
    {
        $user = \Auth::user();
        $video = Video::findOrFail($video_id);
        
        if ($user && $video->user_id == $user->id)
        {
            return view('videos.edit', array
            (
                'video' => $video
            ));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    //Actualizar datos de la edicion
    public function update($video_id, request $request)
    {
        //Valida el formulario
        $validateData = $this->validate($request,
        [
            'title' => 'required',
            'description' => 'required',
            'video' => 'mimes:mp4'
        ]);
        //Datos del video
        $user = \Auth::user();
        $video = Video::FindOrFail($video_id);
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        //Eliminar miniatura
        if ($request->file('image')) 
        {
            Storage::disk('images')->delete($video->image);
            $image = $request->file('image');
            $image_path = time().'_'.$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $video->image = $image_path;
        }
        //Almacena el video
        if ($request->file('video')) 
        {
            Storage::disk('videos')->delete($video->video_path);
            $video_file = $request->file('video');
            $video_file_path = time().'_'.$video_file->getClientOriginalName();
            \Storage::disk('videos')->put($video_file_path, \File::get($video_file));
            $video->video_path = $video_file_path;
        }
        //Guarda la informacion del video
        $video->update();
        return redirect()->route('home')->with(array
        (
            'message' => 'Video actualizado exitosamente'
        ));
    }

    //Busqueda de video y filtro
    public function search($search = null, $filter = null)
    {
        //Si la busqueda es nula guarda lo que venga en el search
        if (is_null($search)) 
        {
            //Si sigue siendo nulo redirecciona al home
            $search =  \Request::get('search');
            if (is_null($search)) 
            {
                return redirect()->route('home');
            }
            return redirect()->route('videoSearch', array('search' => $search));
        }
        //Si la busqueda es diferente de null y el filtro es nulo
        if (is_null($filter) && \Request::get('filter') && !is_null($search)) 
        {
            $filter =  \Request::get('filter');
            return redirect()->route('videoSearch', array('search' => $search, 'filter' => $filter));
        }
        //Variables iniciales para el filtro
        $column = 'id';
        $order = 'desc';
        //Cambios de valor en las variables dependiendo el filtro
        if (!is_null($filter))
        {
            if ($filter == 'old') 
            {
                $order = 'asc';
            }
            elseif ($filter == 'alpha') 
            {
                $column = 'title';
                $order = 'asc';
            }
        }
        $videos = Video::where('title', 'LIKE', '%'. $search. '%')->orderBy($column, $order)->paginate(3);
        return view('videos.search', array('videos' => $videos, 'search' => $search));
    }
}
