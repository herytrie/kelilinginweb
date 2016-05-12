@extends('app')

    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 50%;
      }
/*      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }*/

      /*#pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }*/

/*      #pac-input:focus {
        border-color: #4d90fe;
      }*/

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
    </style>


@section('title')
<title>Create Travel Plan - {!! Auth::user()->name !!}</title>

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><b>Create Travel Plan {!! Auth::user()->name !!}</b></div>

				<div class="panel-body">
					{!! Form::open(['route'=>['plan.newplan'],'role'=> 'form','class' => 'clearfix','files'=>true]) !!}
    					<div id="map"></div>
    					<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('tujuan','Tujuan Wisata :') !!}
						{!! Form::text('tujuan',null,['required' => 'required','class' => 'form-control','placeholder' => 'Masukkan Nama Negara / Kota / Tempat']) !!}
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('judul','Judul :') !!}
						{!! Form::text('judul',null,['required' => 'required','class' => 'form-control']) !!}
						</div>
						</div>
						<div class="col-md-3">
						<div class="form-group">
						{!! Form::label('datefrom','Mulai Tanggal :') !!}
						{!! Form::text('datefrom',null,['required' => 'required','class' => 'form-control']) !!}
						</div>
						</div>
						<div class="col-md-3">
						<div class="form-group">
						{!! Form::label('dateto','Sampai Tanggal :') !!}
						{!! Form::text('dateto',null,['required' => 'required','class' => 'form-control']) !!}
						</div>
						</div>
						<div class="col-md-3">
						<div class="form-group">
						{!! Form::label('lat','Latitude :') !!}
						{!! Form::text('lat',null,['required' => 'required','class' => 'form-control']) !!}
						</div>
						</div>
						<div class="col-md-3">
						<div class="form-group">
						{!! Form::label('lng','Longitude :') !!}
						{!! Form::text('lng',null,['required' => 'required','class' => 'form-control']) !!}
						</div>
						</div>
						
						<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('image','Photo :') !!}
		         		{!! Form::file('image','',['class' => 'btn']) !!}
						</div>
						</div>

					<div class="col-md-12">
					<div class="form-group">
	    				{!! Form::submit('Buat Rencana Perjalanan', ['class'=>'btn btn-primary']) !!}
					</div>
					</div>
	    			{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	<script>
	var latx = document.getElementById("lat");
	var lngx = document.getElementById("lng");
	</script>

	 <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 3.796456, lng: 98.59246699999994},
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('tujuan');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
          latx.value = bounds.H.H;
          lngx.value = bounds.j.H;
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpCtQnxHIl0odalU4P2Ss2epKWEDz80P8&libraries=places&callback=initAutocomplete"
         async defer></script>

	@if ($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li>{!! $error !!}</li>
		@endforeach
	</ul>
@endif


@endsection