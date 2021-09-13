@extends('layouts.app')
@section('content')

<div class="container">
	<div row>
		<h2>Editar video <p>{{ $video->title }}</p></h2>
		<hr>
		<form action="{{ route('updateVideo', ['video_id' => $video->id]) }}" method="post" enctype="multipart/form-data" class="col-lg-7">
			{!! csrf_field() !!}

			@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>
							{{ $error }}
						</li>
						@endforeach
					</ul>
				</div>
			@endif
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control" id="title" value="{{ $video->title }}">
			</div>
			<div class="form-group">
				<label for="description">Descripcion</label>
				<textarea class="form-control" id="description" name="description">{{ $video->description }}</textarea>
			</div>
			<div class="form-group">
				<label for="image">Miniatura</label>
				@if(Storage::disk('images')->has($video->image))
                    <div class="video-image-thumb">
                        <div class="video-image-mask">
                            <img src="{{ url('/miniatura/'.$video->image) }}" class="video-image" />
                        </div>
                    </div>
                @endif
				<input type="file" name="image" class="form-control" id="image">
			</div>
			<div class="form-group">
				<label for="title">Archivo de video</label><br>
				<video controls="" id="video-player" class="video-sides">
					<source src="{{ route('videoFile', ['filename' => $video->video_path]) }}" type="">
					Tu navegador no soporte html5
				</video>
				<input type="file" name="video" class="form-control" id="video">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-warning">Actualizar</button>
			</div>
		</form>
	</div>
</div>









@endsection