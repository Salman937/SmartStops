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
                    <b> Update Location </b>
                    </header>
                    <div class="panel-body">
                        <div class="col-sm-8">
                        @if(Session::has('success'))

                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ Session::get('success') }}
                        </div>
                        
                        @endif

                            <form role="form" action="{{ route('location.update',['id' => $location->id]) }}" method="post">
                            
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label >Title</label>
                                    <input type="text" class="form-control" placeholder="Enter Title" value="{{ $location->title }}" name="title">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('waypoint_name') ? ' has-error' : '' }}">
                                    <label for="">Way-point Name</label>
                                    <input type="text" class="form-control" value="{{ $location->waypoint_name }}" placeholder="Enter Way point name" name="waypoint_name">

                                    @if ($errors->has('waypoint_name'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('waypoint_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="id" value="{{ $location->id }}">
                                <div class="form-group">
                                    <label for="">Search</label>
                                    <input type="text" class="input form-control" id="address" name="address" required/>
                                </div>

                                <div class="form-group">
                                    <label for="">Latitude</label>
                                    <input type="text" class="input form-control" name="lat" id="lat" required/>
                                </div>

                                <div class="form-group">
                                    <label for="">Longitude</label>
                                    <input type="text" class="input form-control" name="log" id="lon" required/>
                                </div>

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

   location: {latitude: {{ $location->latitude }}, longitude: {{ $location->longitude }} },
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
     
