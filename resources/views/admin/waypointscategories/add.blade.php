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
     
