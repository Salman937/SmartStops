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

        return view('admin/waypointscategories/index')
                    ->with('heading','categories')
                    ->with('heading','view_categories')
                    ->with('categories',$categories);
    }

    public function store(Request $request)
    {
       $this->validate($request,[

            'waypoint_name' => 'required', 
            'category_name' => 'required', 
       ]);

       DB::table('waypoints_categories')->insert([

            'waypoint_name' => $request->waypoint_name,
            'category_name' => $request->category_name,
            'created_at'    => date('Y-m-d'),
            'updated_at'    => date('Y-m-d'),
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
        return view('admin/location/locations')->with('id',$id)->with('heading','edit');
    }
}
