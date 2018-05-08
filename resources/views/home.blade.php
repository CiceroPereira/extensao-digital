@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card jumbotron">
          	@if(count($errors) > 0)
				<ul>
				@foreach($errors->all() as $value)
				<li>{{$value}} </li>

				@endforeach
				</ul>
			@endif
            	<div style="text-align: center; opacity: 0.6"><h2>Pluviometria Social</h2></div>
	            <form method="post" action="{{url('/')}}">
	            {{ csrf_field() }}
	            	<div class="form-group">
		            	<label>Nome</label>
		            	<input class="form-control" type="text" name="nome" placeholder="" value="{{{Auth::user()->name}}}" readonly="readonly">
		            </div>
		            <div class="form-group">	
		            	<label>Local</label>
		            	<input id="geofeld" class="form-control" name="local" type="text">
		            		
		            </div>
		            <div class="form-group">
		            	<label>Data</label>
		            	<input class="form-control" type="date" name="data" value="{{ date('Y-m-d') }}">
	            	</div>
	            	 <div class="form-group">
		            	<label>Hora</label>
		            	<input class="form-control" type="time" name="hora" value="{{ date('H:i:s') }}">
	            	</div>
	            	<div class="form-group">
	            		<label>Lâmina(mm)</label>
	            		<input class="form-control" type="number" pattern="[0-9.]+" name="volume">
	            	</div>
	            	<button class="btn btn-block btn-primary">Salvar</button>
	             </div>
	           </form>
        </div>
    </div>
</div>
@endsection
