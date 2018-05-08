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
						<th>Ações</th>
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
						<td>
							<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
							<a href="{{url('/edit', $dados->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
						</td>
					</tr>
				@endforeach	
				</tbody>
			</table>
			

		</div>
	</div>
@endsection
