@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Crear nuevo video</h2>
		<hr>
		<form action="{{ route('saveVideo') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
				<input type="text" name="title" class="form-control" id="title">
			</div>
			<div class="form-group">
				<label for="description">Descripcion</label>
				<textarea class="form-control" id="description" name="description"></textarea>
			</div>
			<div class="form-group">
				<label for="image">Miniatura</label>
				<input type="file" name="image" class="form-control" id="image">
			</div>
			<div class="form-group">
				<label for="title">Archivo de video</label>
				<input type="file" name="video" class="form-control" id="video">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Crear video</button>
			</div>
		</form>
	</div>
</div>
@endsection