@extends('layouts.template')
@section('content')
<!--main content start-->
<section id="main-content">
   <section class="wrapper">
      <div class="row">
         <div class="col-sm-12">
            <section class="panel">
               <header class="panel-heading">
                  All Details
                  <span class="tools pull-right">
                  <a href="javascript:;" class="fa fa-chevron-down"></a>
                  <a href="javascript:;" class="fa fa-times"></a>
                  </span>
               </header>
               <div class="panel-body">
                  @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     {{ Session::get('success') }}
                  </div>
                  @endif      
                  <div class="row">
                      <div class="col-sm-8 col-sm-offset-2">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Category Name</b> <span class="pull-right"><b> {{ $data->category_name }}</b></span> </li>
                            <li class="list-group-item"><b>Waypoint Name</b> <span class="pull-right"><b> {{ $data->waypoint_name }}</b></span> </li>
                            <li class="list-group-item"><b>Sub Categories</b> <span class="pull-right"><b> {{ $data->sub_cat }}</b></span> </li>
                            <li class="list-group-item"><b>Address</b> <span class="pull-right"><b> {{ $data->addrs }}</b></span> </li>
                            <li class="list-group-item"><b>Postal Code</b> <span class="pull-right"><b> {{ $data->postal_code }}</b></span> </li>
                            <li class="list-group-item"><b>Additional Info</b> <span class="pull-right"><b> {{ $data->additional_info }}</b></span> </li>
                            <li class="list-group-item"><b>Country</b> <span class="pull-right"><b> {{ $data->country }}</b></span> </li>
                            <li class="list-group-item"><b>Province</b> <span class="pull-right"><b> {{ $data->province }}</b></span> </li>
                            <li class="list-group-item"><b>Waypoint ID</b> <span class="pull-right"><b> {{ $data->waypoint_id }}</b></span> </li>
                            <li class="list-group-item"><b>Expiry Date</b> <span class="pull-right"><b> {{ $data->exp_date }}</b></span> </li>
                            <li class="list-group-item"><b>Email ID</b> <span class="pull-right"><b> {{ $data->email_id }}</b></span> </li>
                            <li class="list-group-item"><b>Phone Number</b> <span class="pull-right"><b> {{ $data->phone_number }}</b></span> </li>
                            <li class="list-group-item"><b>Entery Date</b> <span class="pull-right"><b> {{    date('m-d-Y', strtotime($data->created_at)) }}</b></span> </li>
                            <li class="list-group-item"><b>Entered By</b> <span class="pull-right">
                                <button class="btn btn-info btn-xs">{{ $data->operater_name }}</button>
                            </span> </li>
                        </ul>
                      </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </section>
</section>
<!--main content end-->
@endsection