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
                              <th>Category</th>
                              <th>Sub Category</th>
                              <th>latDMS</th>
                              <th>longDMS</th>
                              <th>Status</th>
                              <th>Waypoint Name</th>
                              <th>Expiry Date</th>
                              <th>Expiry Check</th>
                              <th>View</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($categories as $category)
                           <tr>
                              <td>{{ $category->category_name }}</td>
                              <td>{{ $category->sub_cat }}</td>
                              <td>{{ $category->lat }}</td>
                              <td>{{ $category->long }}</td>
                              <td>
                                  <a href="" class="btn btn-xs btn-success">
                                      Published
                                  </a>
                              </td>
                              <td>{{ $category->waypoint_name }}</td>
                              <td>{{ $category->exp_date }}</td>
                              <td>
                                  <input type="checkbox" name="" id="">
                              </td>
                              <td>
                                    <a href="{{ route('waypointscategories.show',['id' => $category->id]) }}" class="btn btn-xs btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                              </td>
                              <td>
                                 <a href="{{ route('waypointscategories.edit',['id' => $category->id]) }}" class="btn btn-info btn-xs">
                                 <i class="fas fa-pencil-alt"></i>
                                 </a>
                              </td>
                              <td>
                                 <form action="{{ route('waypointscategories.destroy',['id' => $category->id]) }}" method="post" accept-charset="utf-8">
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