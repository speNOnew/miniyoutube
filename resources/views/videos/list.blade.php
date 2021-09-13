<div id="videos-list">
    @if(count($videos) >= 1)
        @foreach($videos as $video)
            <div class="video-item col-md-10 pull-left panel panel-default">
                <div class="panel-body">
                    <!-- Imagen del video -->
                    @if(Storage::disk('images')->has($video->image))
                    <div class="video-image-thumb col-md-3 pull-left">
                        <div class="video-image-mask">
                            <img src="{{ url('/miniatura/'.$video->image) }}" class="video-image" />
                        </div>
                    </div>
                    @endif
                    <div class="data">
                        <h4 class="video-title">
                            <a href="{{ route('videoDetail', ['video_id' => $video->id]) }}">{{ $video->title }}</a>
                        </h4>
                        <a href="{{ route('channel', ['user_id' => $video->user_id]) }}">
                            {{$video->user->name.' '.$video->user->surname}} 
                        </a>
                        <label>
                            {{\FormatTime::LongTimeFilter($video->created_at)}}
                        </label>
                    </div>
                    <!-- Botones -->
                    <a href="{{ route('videoDetail', ['video_id' => $video->id]) }}" class="btn btn-success">Ver</a>
                    @if(Auth::check() && Auth::user()->id == $video->user->id)
                        <a href="{{ route('videoEdit', ['video_id' => $video->id]) }}" class="btn btn-warning">Editar</a>
                        <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                        <a href="#YiiModal{{ $video->id }}" role="button" class="btn btn-danger" data-toggle="modal">Eliminar</a>
                        <!-- Modal / Ventana / Overlay en HTML -->
                        <div id="YiiModal{{ $video->id }}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Eliminar video</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro que quieres eliminar el video?</p>
                                        <p class="text-warning"><small>{{ $video->title }}</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ url('delete-video/'. $video->id) }}" type="button" class="btn btn-danger">Eliminar</a>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="" class="btn btn-danger">Eliminar</a> -->
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning"> No hay resultados de algun video</div>
    @endif
    <div class="clearfix"></div>
    <center>{{ $videos->links() }}</center>
</div>