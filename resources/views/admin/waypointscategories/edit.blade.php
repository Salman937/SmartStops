@extends('layouts.template')
      
@section('content')

<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    <i class="fas fa-pen-alt"></i> Update Category
                    </header>
                    <div class="panel-body">
                        <div class="col-sm-12">
                        @if(Session::has('success'))

                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ Session::get('success') }}
                        </div>
                        
                        @endif
                        <form role="form" action="{{ route('waypointscategories.update',['id' => $category->id]) }}" method="post">
                            
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('waypoint_name') ? ' has-error' : '' }}">
                                        <label >Waypoint Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Way-Point Name" name="waypoint_name" value="{{ $category->waypoint_name}}">
    
                                        @if ($errors->has('waypoint_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('waypoint_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Category Name" name="category_name"  value="{{ $category->category_name}}">
    
                                        @if ($errors->has('category_name'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('category_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label >Make Pulsing/Blinking this Waypoint</label>
                                        <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-exclamation-circle"></i></div>
                                        <select name="pulse" class="form-control" id="">
                                            
                                            <option value='{{ $category->pulse }}' selected>{{ $category->pulse }}</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <p class="help-block">Is that something special about this waypoint Make it <b>
                                     YES </b> </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                        <label for="">Postal Code/Zip Code (Optional)</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Postal Code/Zip Code" name="postal_code" value="{{ $category->postal_code}}">
    
                                        @if ($errors->has('postal_code'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('postal_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('sub_cat') ? ' has-error' : '' }}">
                                        <label for="">Sub Categories</label>
                                        <textarea name="sub_cat" id="sub_cat" class="form-control" rows="5" placeholder="Enter Sub Category" rows="10">{{ $category->sub_cat }}</textarea>
                                        <p class="help-block">Please seprate sub catgory with comma ","</p>
    
                                        @if ($errors->has('sub_cat'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('sub_cat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('addrs') ? ' has-error' : '' }}">
                                        <label for="">Address(Optional)</label>
                                        <textarea class="form-control" name="addrs" id="" rows="5"> {{$category->addrs }}</textarea>
    
                                        @if ($errors->has('addrs'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('addrs') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            <!-- <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label for="">LongDMS</label>
                                        <input type="text" class="input form-control" name="long" id="longitude"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">LatDMS</label>
                                        <input type="text" class="input form-control" name="lat" id="latitude"/>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('operator_name') ? ' has-error' : '' }}">
                                        <label for="">Operator's Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Operator's Name" name="operator_name"  value="{{ $category->operater_name}}">
    
                                        @if ($errors->has('operator_name'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('operator_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('additional_info') ? ' has-error' : '' }}">
                                        <label for="">Additional Info (Optional)</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Additional Info" name="additional_info"  value="{{ $category->additional_info}}">
    
                                        @if ($errors->has('additional_info'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('additional_info') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                        <label for="">Country</label>
                                        <input type="text" class="form-control" id="" placeholder="Canada" name="country"  value="{{ $category->country}}">
    
                                        @if ($errors->has('country'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                                        <label for="">Province/State</label>
                                        <input type="text" class="form-control" id="" placeholder="British Columbia" name="province"  value="{{ $category->province}}">
    
                                        @if ($errors->has('province'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('province') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('waypoint_id') ? ' has-error' : '' }}">
                                        <label for="">Waypoint ID</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Waypoint ID" name="waypoint_id"  value="{{ $category->waypoint_id}}">
    
                                        @if ($errors->has('waypoint_id'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('waypoint_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('exp_date') ? ' has-error' : '' }}">
                                        <label for="">Expiry Date</label>
                                        <input type="text" onfocus="(this.type='date')"  id="date" class="form-control" name="exp_date" placeholder="Never Expire"  value="{{ $category->exp_date}}">
                                        <p class="help-block">If need expiry date then click to select expiry date</p>
                                        @if ($errors->has('exp_date'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('exp_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('email_id') ? ' has-error' : '' }}">
                                        <label for="">Email ID (Optional)</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Email ID (Optional)" name="email_id"  value="{{ $category->email_id}}">
    
                                        @if ($errors->has('email_id'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('email_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <label for=""> Phone Number (Optional)</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter  Phone Number" name="phone_number"  value="{{ $category->phone_number}}">
    
                                        @if ($errors->has('phone_number'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('latitude') ? ' has-error' : '' }}">
                                        <label for=""> Latitude </label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Latitude" name="latitude"  value="{{ $category->latitude}}">
    
                                        @if ($errors->has('latitude'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('latitude') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('longitude') ? ' has-error' : '' }}">
                                        <label for=""> Longitude </label>
                                        <input type="text" class="form-control" id="" placeholder="Enter longitude" name="longitude"  value="{{ $category->longitude}}">
    
                                        @if ($errors->has('longitude'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('longitude') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('location_name') ? ' has-error' : '' }}">
                                        <label for=""> Location Name </label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Location Name" name="location_name"  value="{{ $category->location_name}}">
    
                                        @if ($errors->has('location_name'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('location_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-info"><i class="fas fa-pen-alt"></i> Update</button>
                                </div>
                                
                            </div> 
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
     
