@extends('layouts.template')
      
@section('content')

<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyCO78LKT42tZE-MgQUQBP-hrOvaGgxayYs&sensor=false&libraries=places'></script>

<script src="{{ asset('assets/js/locationpicker.jquery.js') }}"></script> 

<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    <b> Add Location to Category </b>
                    </header>
                    <div class="panel-body">
                        <div class="col-sm-8">
                        @if(Session::has('success'))

                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ Session::get('success') }}
                        </div>
                        
                        @endif

                            <form role="form" action="{{ route('location.store') }}" method="post">
                            
                            {{ csrf_field() }}

                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label >Title</label>
                                    <input type="text" class="form-control" placeholder="Enter Title" name="title">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('waypoint_name') ? ' has-error' : '' }}">
                                    <label for="">Way-point Name</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Way point name" name="waypoint_name">

                                    @if ($errors->has('waypoint_name'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('waypoint_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="id" value="{{ $id }}">

                                <div class="form-group">
                                    <label for="">Search</label>
                                    <input type="text" class="input form-control" id="address" onchange="myfunc()" name="address" required/>
                                </div>

                                <div class="form-group">
                                    <label for="">Latitude</label>
                                    <input type="text" class="input form-control" name="lat" id="latitude" required/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Longitude</label>
                                    <input type="text" class="input form-control" name="lat" id="longitude" required/>
                                </div>
                                
                                <input type="hidden" name="latitude" class="get_lat" id="lat"/>
                                <input type="hidden" name="longitude" class="get_long" id="lon"/>

                                <div id="map-view" class="is-vcentered" style="width: 100%; height:400px;"></div>
                                <br>
                                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->

<script>

 $('#map-view').locationpicker({

   location: {latitude: 25.7276167, longitude: -80.24209209999998},
   enableAutocomplete: true,
   radius:0,
   onchanged: function (currentLocation, radius, isMarkerDropped) {
       var addressComponents = $(this).locationpicker('map').location.addressComponents;
       // updateControls(addressComponents);
   },
   oninitialized: function(component) {
       var addressComponents = $(component).locationpicker('map').location.addressComponents;
       // updateControls(addressComponents);
   },
   inputBinding: {
       latitudeInput: $('#lat'),
       longitudeInput: $('#lon'),
       locationNameInput: $('#address'),
   },
 });

// This function returns the coordinate
// conversion string in DD to DMS.
function ddToDms(lat) {

var lat = lat;

var latResult, dmsResult;

lat = parseFloat(lat);  


latResult = (lat >= 0)? 'N ' : 'S ';

// Call to getDms(lat) function for the coordinates of Latitude in DMS.
// The result is stored in latResult variable.
latResult += getDms(lat);

// Joining both variables and separate them with a space.
dmsResult = latResult;

// Return the resultant string
return dmsResult;
}

function dms(lng)
{
    var lng = lng;

    var lngResult;

    lng = parseFloat(lng);

    lngResult = (lng >= 0)? 'E ' : 'W ';

    // Call to getDms(lng) function for the coordinates of Longitude in DMS.
    // The result is stored in lngResult variable.
    lngResult += getDms(lng);

    // Joining both variables and separate them with a space.
    dmsResult = lngResult;

    // Return the resultant string
    return dmsResult;
}

function getDms(val) {

var valDeg, valMin, valSec, result;

val = Math.abs(val);

valDeg = Math.floor(val);
result = valDeg + "º";

valMin = Math.floor((val - valDeg) * 60);
result += valMin + "'";

valSec = Math.round((val - valDeg - valMin / 60) * 3600 * 1000) / 1000;
result += valSec + '"';

return result;
}

window.onload = function()
{

    var lat  = $("#lat").val(); 
    var lng  = $("#lon").val();

    var latdmsCoords  = ddToDms(lat);
    var longdmsCoords = ddToDms(lng);

    $("#latitude").val(latdmsCoords); 
    $("#longitude").val(longdmsCoords);
}

function myfunc()
{
    var lat  = $("#lat").val(); 
    var lng  = $("#lon").val();

    var latdmsCoords  = ddToDms(lat);
    var longdmsCoords = ddToDms(lng);

    $("#latitude").val(latdmsCoords); 
    $("#longitude").val(longdmsCoords);
}


</script>

@endsection
     
