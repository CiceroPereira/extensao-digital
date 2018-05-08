@extends('layouts.app')

@section('content')
<div class="container">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Local</th>
						<th>Data</th>
						<th>Hora</th>
						<th>Lâmina(mm)</th>
					</tr>
				</thead>
				<tbody>
				@foreach($all as $dados )
					<tr>
						<td>{{$dados->nome}}</td>
						<td>{{$dados->local}}</td>
						<td>{{$dados->data}}</td>
						<td>{{$dados->hora}}</td>
						<td>{{$dados->volume}}</td>
					</tr>
				@endforeach	
				</tbody>
			</table>
			

		</div>
	</div>
@endsection
