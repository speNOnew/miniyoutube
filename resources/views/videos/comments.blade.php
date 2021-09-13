<hr>
<h4 class="title-coments">Comentarios</h4>
<hr>
@if(session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
@endif

@if(Auth::check())
<form class="col-md-12" method="post" action="{{ route('comment') }}">
	{!! csrf_field() !!}
	<input type="hidden" name="video_id" value="{{ $video->id }}" required>
	<p>
		<textarea class="form-control" name="body" required placeholder="Añade un comentario publico"></textarea>
	</p>
	<input type="submit" value="Comentar" class="btn btn-success pull-right"><br><br><br>
</form>
@endif

@if(isset($video->comments))
	<div id="comment-list">
		@foreach($video->comments as $comment)
			<div class="comment-item col-md-12 pull-left">
				<div class="panel panel-default comment-data">
					<div class="panel-heading">
						<div class="panel-title">
							<strong>{{ $comment->user->name. ' ' .$comment->user->surname }}</strong>
							{{ \FormatTime::LongTimeFilter($comment->created_at) }}
						</div>
					</div>
					<div class="panel-body">
						{{ $comment->body }}
						<!-- Boton de eliminar comentario -->
						@if( Auth::check() && (Auth::user()->id == $video->user_id || Auth::user()->id == $comment->user_id))
							<div class="pull-right">
								<!-- Botón en HTML (lanza el modal en Bootstrap) -->
								<a href="#YiiModal{{ $comment->id }}" role="button" class="btn btn-danger" data-toggle="modal">Eliminar</a>
								  
								<!-- Modal / Ventana / Overlay en HTML -->
								<div id="YiiModal{{ $comment->id }}" class="modal fade">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								                <h4 class="modal-title">Eliminar comentario</h4>
								            </div>
								            <div class="modal-body">
								                <p>¿Seguro que quieres borrar este comentario?</p>
								                <p class="text-warning"><small>{{ $comment->body }}</small></p>
								            </div>
								            <div class="modal-footer">
								                <a href="{{ url('delete-comment/'. $comment->id) }}" type="button" class="btn btn-danger">Eliminar</a>
								                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								            </div>
								        </div>
								    </div>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endif