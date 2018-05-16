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
		            	<input class="form-control" type="time" name="hora" value="{{ date('H:i') }}">
	            	</div>
	            	<div class="form-group">
	            		<label>Lâmina(mm)</label>
	            		<input class="form-control" type="number" step="any" name="volume">
	            	</div>
                <div class="form-group">
                  <input class="form-control" type="number" hidden="hidden" name="user_id" value="{{{Auth::user()->id}}}">
                </div>
	            	<button class="btn btn-block btn-primary">Salvar</button>
	             </div>
	           </form>
        </div>
    </div>
</div>
<script>
      function displayLocation(latitude,longitude){
        var request = new XMLHttpRequest();

        var method = 'GET';
        var url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
        var async = true;

        request.open(method, url, async);
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var data = JSON.parse(request.responseText);
            var address = data.results[4];
          //  document.write(address.formatted_address);
            var str = address.formatted_address;
            document.getElementById("geofeld").setAttribute("value", str);
          }
        };
        request.send();
      };

      var successCallback = function(position){
        var x = position.coords.latitude;
        var y = position.coords.longitude;
        displayLocation(x,y);
      };


      var errorCallback = function(error){
        var errorMessage = 'Unknown error';
        switch(error.code) {
          case 1:
            errorMessage = 'Permission denied';
            break;
          case 2:
            errorMessage = 'Position unavailable';
            break;
          case 3:
            errorMessage = 'Timeout';
            break;
        }
  //      document.write(errorMessage);
            alert(errorMessage);
      };
            
      var options = {
        enableHighAccuracy: true,
        timeout: 10000,
        maximumAge: 0
      };

      navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);
      </script>
@endsection
