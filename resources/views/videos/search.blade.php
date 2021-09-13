@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
        	<div class="col-md-6">
            	<h3>Resultado de la busqueda "{{ $search }}"</h3>
        	</div>
        	<div class="col-md-6">
	            <form class="select-filter col-md-4 pull-right" action="{{ url('/buscar/'. $search) }}" method="get">
		            <div class="col-md-12">
			            <select name="filter" class="pull-right form-control">
			            	<option value="null">Ordenar</option>
			            	<option value="new">Nuevos</option>
			            	<option value="old">Antiguos</option>
			            	<option value="alpha">Alfabeticamente</option>
			            </select>
		            </div>
		            <div class="btn-sides col-md-2">
	            		<input type="submit" value="ir" class="btn btn-default pull-left">
		            </div>
	            </form>
        	</div>
		</div>
	<div class="clearfix"></div><br>
    @include('videos.list')
</div>
@endsection