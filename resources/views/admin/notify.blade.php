@extends('layouts.template')
@section('content')
<!--main content start-->
<section id="main-content">
   <section class="wrapper">
      <div class="row">
         <div class="col-sm-12">
            <section class="panel">
               <header class="panel-heading">
                  Send Notification
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
                  <a href="{{ route('send-notify') }}" class="text-center col-sm-offset-5">
                    <button class="btn btn-info"> <i class="fas fa-share"></i> Send Notifiction</button>
                  </a>  
               </div>
            </section>
         </div>
      </div>
   </section>
</section>
<!--main content end-->
@endsection