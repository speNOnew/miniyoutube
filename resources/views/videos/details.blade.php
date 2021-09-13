@extends('layouts.app')
@section('content')
<div class="col-md-10 col-md-offset-1">
	<h2>{{ $video->title }}</h2>
	<hr>
	<div class="col-md-8">
		<!-- Video -->
		<video controls="" id="video-player" class="video-sides">
			<source src="{{ route('videoFile', ['filename' => $video->video_path]) }}" type="">
			Tu navegador no soporte html5
		</video>
		<!-- Descripcion -->
		<div class="panel panel-default video-data">
			<div class="panel-heading">
				<div class="panel-title">
					Subido por 
					<strong>
						<a href="{{ route('channel', ['user_id' => $video->user_id]) }}">
							{{ $video->user->name . ' ' . $video->user->surname}}
						</a>
					</strong> 
					{{ \FormatTime::LongTimeFilter($video->created_at) }}
				</div>
			</div>
			<div class="panel-body">
				{{ $video->description }}
			</div>
		</div>
		<!-- Comentarios -->
		@include('videos.comments')
	</div>
</div>
@endsection