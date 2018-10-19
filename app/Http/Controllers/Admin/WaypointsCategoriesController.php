<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class WaypointsCategoriesController extends Controller
{
    public function index()
    {
        $categories = DB::table('waypoints_categories')->get();

        // dd($categories);

        return view('admin/waypointscategories/index')
                    ->with('heading','categories')
                    ->with('heading','view_categories')
                    ->with('categories',$categories);
    }

    public function store(Request $request)
    {
       $this->validate($request,[

            'waypoint_name'   => 'required', 
            'category_name'   => 'required', 
            'sub_cat'         => 'required', 
            'lat'             => 'required', 
            'long'            => 'required', 
            'addrs'           => 'required', 
            'country'         => 'required', 
            'province'        => 'required', 
            'waypoint_id'     => 'required', 
            'latitude'        => 'required', 
            'longitude'       => 'required', 
            'operator_name'   => 'required', 
       ]);

       DB::table('waypoints_categories')->insert([

            'waypoint_name'     => $request->waypoint_name,
            'category_name'     => $request->category_name,
            'sub_cat'           => $request->sub_cat,
            'lat'               => $request->lat,
            'long'              => $request->long,
            'addrs'             => $request->addrs,
            'postal_code'       => $request->postal_code,
            'additional_info'   => $request->additional_info,
            'country'           => $request->country,
            'province'          => $request->province,
            'waypoint_id'       => $request->waypoint_id,
            'exp_date'          => (!empty($request->exp_dat)) ? $request->exp_dat:'Never Expire',
            'email_id'          => $request->email_id,
            'phone_number'      => $request->phone_number,
            'address'           => $request->address,
            'latitude'          => $request->latitude,
            'longitude'         => $request->longitude,
            'pulse'             => $request->pulse,
            'operater_name'     => $request->operator_name,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
       ]);

       Session::flash('success','Category Added Successfully');

       return redirect()->back();
    }

    public function create()
    {
        return view('admin/waypointscategories/add')
                    ->with('heading','categories');
    }

    public function destroy($id)
    {
        $category = DB::table('waypoints_categories')->where('id',$id)->delete();

        Session::flash('success','Category Deleted Successfully');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = DB::table('waypoints_categories')->where('id',$id)->first();

        return view('admin/waypointscategories/edit')->with('category',$categories)->with('heading','edit');
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

            'waypoint_name'  => 'required',
            'category_name'  => 'required',
        ]);

        DB::table('waypoints_categories')->where('id',$id)->update([

            'waypoint_name' => $request->waypoint_name,
            'category_name' => $request->category_name,
            'created_at'    => date('Y-m-d'),
            'updated_at'    => date('Y-m-d'),
        ]);

        Session::flash('success','Category Updated Successfully');

        return redirect()->route('waypointscategories.index');
    }

    public function show($id)
    {
        $all_data = DB::table('waypoints_categories')->where('id',$id)->first();

        // dd($all_data);

        return view('admin/waypointscategories/category_details')->with('data',$all_data)->with('heading','edit');
    }

}
