@extends('layouts.template')
@section('content')
<!--main content start-->
<section id="main-content">
   <section class="wrapper">
      <div class="row">
         <div class="col-sm-12">
            <section class="panel">
               <header class="panel-heading">
                  App Reviews
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
                  <div class="adv-table">
                     <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                           <tr>
                              <th>Review</th>
                              <th>Feedback</th>
                              <th>Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($reviews as $review)
                           <tr>
                              <td>{{ $review->review }}</td>
                              <td>{{ $review->feedback }}</td>
                              <td>{{ $review->created_at }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </section>
</section>
<!--main content end-->
@endsection