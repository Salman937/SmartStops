@extends('layouts.template')

@section('content')
<!--main content start-->
<section id="main-content">
   <section class="wrapper">
      <div class="row">
         <div class="col-sm-12">
            <section class="panel">
               <header class="panel-heading">
                  All Categories
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
                              <th>Category Name</th>
                              <th>Title</th>
                              <th>Waypoint Name</th>
                              <th>Location</th>
                              <th>Latitude</th>
                              <th>Longitude</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($locations as $location)
                           <tr>
                              <td>{{ $location->category_name }}</td>
                              <td>{{ $location->title }}</td>
                              <td>{{ $location->detail_way_point }}</td>
                              <td>{{ $location->location }}</td>
                              <td>{{ $location->latitude }}</td>
                              <td>{{ $location->longitude }}</td>
                              <td>
                                 <a href="{{ route('waypointscategories.edit',['id' => $location->id]) }}" class="btn btn-info btn-xs">
                                 <i class="fas fa-pencil-alt"></i>
                                 </a>
                              </td>
                              <td>
                                 <form action="{{ route('location.destroy',['id' => $location->location_id]) }}" method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-xs">
                                    <i class="fa fa-minus-circle"></i>
                                    </button>
                                 </form>
                              </td>
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