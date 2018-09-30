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
                                <section class="panel">
                                    <header class="panel-heading">
                                        All Categories
                                    </header>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Way-Point Name</th>
                                            <th>Category Name</th>
                                            <th>Add Loctions to Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($categories as $category)
                                            
                                            <tr>
                                                <td>{{ $category->waypoint_name }}</td>
                                                <td>{{ $category->category_name }}</td>
                                                <td>
                                                <a class="btn btn-success btn-xs" href="{{ route('add_locations',['id' => $category->id]) }}">
                                                <i class="fas fa-map-marked-alt"></i></td>
                                                </a>
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
                                </section>

                    </div>
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->

@endsection
     
