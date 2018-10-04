@extends('layouts.template')
      
@section('content')

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
                                    <label for="">Latitude</label>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Longitude</label>
                                   
                                </div>
                                
                                
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



@endsection
     
