@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
   		<div class="col-md-8">
            <div class="jumbotron">
            	<div style="text-align: center; opacity: 0.6"><h2>Volume acumulado</h2></div>
				<form method="post" action="{{url('/acumulado')}}">
					{{ csrf_field() }}
					<div class="form-group">
						<label>Data de inicio</label>
						<input type="date" name="date1" class="form-control">
					</div>
					<div class="form-group">
						<label>Data final</label>
						<input type="date" name="date2" class="form-control">
					</div>
					<div class="form-group">
						@if(isset($soma))
							<label>Volume acumulado no período</label>
							<input type="" name="vol" value="{{$soma}}" class="form-control" readonly="readonly">
						@else
						@endif
						
					</div>
						<input type="submit" value="Search" class="btn btn-primary btn-block">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection