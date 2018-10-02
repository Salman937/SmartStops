<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'  => 'required',
            'waypoint_name'  => 'required',
        ]);

        DB::table('waypoints_category_details')->insert([

            'waypoints_category_id' => $request->id,
            'title'                 => $request->title,
            'waypoint_name'         => $request->waypoint_name,
            'location'              => $request->address,
            'latitude'              => $request->lat,
            'longitude'             => $request->log,
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);

       Session::flash('success','Location Added Successfully');

       return redirect()->route('waypointscategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locations = DB::table('waypoints_category_details')
                              ->select(['waypoints_categories.*','waypoints_category_details.*','waypoints_category_details.waypoint_name AS detail_way_point','waypoints_category_details.id AS location_id'])  
                              ->join('waypoints_categories', 'waypoints_categories.id', '=', 'waypoints_category_details.waypoints_category_id')
                              ->where('waypoints_category_id',$id)->get();

        return view('admin/location/all_locations')->with('locations',$locations)->with('heading','location');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = DB::table('waypoints_category_details')->where('id',$id)->first();

        return view('admin/location/update_location')->with('location',$location)->with('heading','update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'  => 'required',
            'waypoint_name'  => 'required',
        ]);

        DB::table('waypoints_category_details')->where('id',$id)->update([

                'waypoints_category_id' => $id,
                'title'                 => $request->title,
                'waypoint_name'         => $request->waypoint_name,
                'location'              => $request->address,
                'latitude'              => $request->lat,
                'longitude'             => $request->log,
                'updated_at'            => date('Y-m-d H:i:s'),
        ]);

        Session::flash('success','Location Updated Successfully');

        return redirect()->route('waypointscategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = DB::table('waypoints_category_details')->where('id',$id)->delete();

        Session::flash('success','Location Deleted Successfully');

        return redirect()->back();
    }
}
