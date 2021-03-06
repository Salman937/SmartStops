@extends('layouts.template')
      
@section('content')

<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                      <i class="fas fa-plus-circle"></i> Add Categories
                    </header>
                    <div class="panel-body">
                        @if(Session::has('success'))

                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ Session::get('success') }}
                        </div>
                        
                        @endif

                        <form role="form" action="{{ route('waypointscategories.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('waypoint_name') ? ' has-error' : '' }}">
                                        <label >Waypoint Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Way-Point Name" name="waypoint_name">
    
                                        @if ($errors->has('waypoint_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('waypoint_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Category Name" name="category_name">
    
                                        @if ($errors->has('category_name'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('category_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label >Make Pulsing/Blinking this Waypoint</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-exclamation-circle"></i></div>
                                        <select name="pulse" class="form-control" id="">
                                            <option>Make Pulse</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <p class="help-block">Is that something special about this waypoint Make it <b>
                                     YES </b> </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                        <label for="">Postal Code/Zip Code (Optional)</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Postal Code/Zip Code" name="postal_code">
    
                                        @if ($errors->has('postal_code'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('postal_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('sub_cat') ? ' has-error' : '' }}">
                                        <label for="">Sub Categories</label>
                                        <textarea name="sub_cat" id="sub_cat" class="form-control" rows="5" placeholder="Enter Sub Category" rows="10"></textarea>
                                        <p class="help-block">Please seprate sub catgory with comma ","</p>
    
                                        @if ($errors->has('sub_cat'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('sub_cat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('addrs') ? ' has-error' : '' }}">
                                        <label for="">Address(Optional)</label>
                                        <textarea class="form-control" name="addrs" id="" rows="5"></textarea>
    
                                        @if ($errors->has('addrs'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('addrs') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            <!-- <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label for="">LongDMS</label>
                                        <input type="text" class="input form-control" name="long" id="longitude"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">LatDMS</label>
                                        <input type="text" class="input form-control" name="lat" id="latitude"/>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('operator_name') ? ' has-error' : '' }}">
                                        <label for="">Operator's Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Operator's Name" name="operator_name">
    
                                        @if ($errors->has('operator_name'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('operator_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('additional_info') ? ' has-error' : '' }}">
                                        <label for="">Additional Info (Optional)</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Additional Info" name="additional_info">
    
                                        @if ($errors->has('additional_info'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('additional_info') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                        <label for="">Country</label>
                                        <input type="text" class="form-control" id="" placeholder="Canada" name="country">
    
                                        @if ($errors->has('country'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                                        <label for="">Province/State</label>
                                        <input type="text" class="form-control" id="" placeholder="British Columbia" name="province">
    
                                        @if ($errors->has('province'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('province') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('waypoint_id') ? ' has-error' : '' }}">
                                        <label for="">Waypoint ID</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Waypoint ID" name="waypoint_id">
    
                                        @if ($errors->has('waypoint_id'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('waypoint_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('exp_date') ? ' has-error' : '' }}">
                                        <label for="">Expiry Date</label>
                                        <input type="text" onfocus="(this.type='date')"  id="date" class="form-control" name="exp_date" placeholder="Never Expire">
                                        <p class="help-block">If need expiry date then click to select expiry date</p>
                                        @if ($errors->has('exp_date'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('exp_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('email_id') ? ' has-error' : '' }}">
                                        <label for="">Email ID (Optional)</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Email ID (Optional)" name="email_id">
    
                                        @if ($errors->has('email_id'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('email_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <label for=""> Phone Number (Optional)</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter  Phone Number" name="phone_number">
    
                                        @if ($errors->has('phone_number'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('latitude') ? ' has-error' : '' }}">
                                        <label for=""> Latitude </label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Latitude" name="latitude">
    
                                        @if ($errors->has('latitude'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('latitude') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('longitude') ? ' has-error' : '' }}">
                                        <label for=""> Longitude </label>
                                        <input type="text" class="form-control" id="" placeholder="Enter longitude" name="longitude">
    
                                        @if ($errors->has('longitude'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('longitude') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('location_name') ? ' has-error' : '' }}">
                                        <label for=""> Location Name </label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Location Name" name="location_name">
    
                                        @if ($errors->has('location_name'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('location_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>
                                </div>
                                
                            </div> 
                        </form>
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
     
