@extends('layouts.app')
@section('content')
<div class="container">
		<div class="row">
            <h3>Canal de {{ $user->name . ' ' . $user->surname}}</h3>
		</div>
	<div class="clearfix"></div><br>
    @include('videos.list')
</div>
@endsection