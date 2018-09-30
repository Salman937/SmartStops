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
                    <b> Category: {{ $location->category_name }} </b>
                    </header>
                    <div class="panel-body">
                        <div class="col-sm-6">
                        @if(Session::has('success'))

                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ Session::get('success') }}
                        </div>
                        
                        @endif

                            <form role="form" action="{{ route('waypointscategories.store') }}" method="post">
                            {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('waypoint_name') ? ' has-error' : '' }}">
                                    <label >Way-Point Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Way-Point Name" name="waypoint_name">

                                    @if ($errors->has('waypoint_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('waypoint_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}">
                                    <label for="">Category Name</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Category Name" name="category_name">

                                    @if ($errors->has('category_name'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('category_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
            <label for="">Search</label>
            <input type="text" class="input form-control" id="address" name="address" />
          </div>

          <div id="map-view" class="is-vcentered" style="width: 100%; height:400px;"></div>

          <input type="hidden" name="lat" id="lat">
          <input type="hidden" name="log" id="lon">
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
       locationNameInput: $('#address')
   },

 });

</script>

@endsection
     
