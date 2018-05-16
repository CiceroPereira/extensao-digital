@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron">
          	@if(count($errors) > 0)
				<ul>
				@foreach($errors->all() as $value)
				<li>{{$value}} </li>

				@endforeach
				</ul>
			@endif
            	<div style="text-align: center; opacity: 0.6"><h2>Pluviometria Social</h2></div>
	            <form method="post" action="{{url('/edit/'.$dado->id)}}">
	            {{method_field('PUT')}}
	            {{ csrf_field() }}
	            	<div class="form-group">
		            	<label>Nome</label>
		            	<input class="form-control" type="text" name="nome" placeholder="" value="{{old('nome', $dado->nome)}}" readonly="readonly">
		            </div>
		            <div class="form-group">	
		            	<label>Local</label>
		            	<input id="" class="form-control" name="local" type="text" readonly="readonly" value="{{old('local',$dado->local)}}">
		            		
		            </div> 
		            <div class="form-group">
		            	<label>Data</label>
		            	<input class="form-control" type="date" name="data" value="{{old('data', $dado->data)}}">
	            	</div>
	            	 <div class="form-group">
		            	<label>Hora</label>
		            	<input class="form-control" type="time" name="hora" value="{{old('hora', $dado->hora)}}">
	            	</div>
	            	<div class="form-group">
	            		<label>Lâmina(mm)</label>
	            		<input class="form-control" type="number" step="any" name="volume" value="{{old('volume', $dado->volume)}}">
	            	</div>
	            	<button class="btn btn-block btn-primary">Salvar</button>
	             </div>
	           </form>
        </div>
    </div>
</div>
@endsection
