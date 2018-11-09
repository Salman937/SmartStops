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
            'addrs'           => 'required', 
            'country'         => 'required', 
            'province'        => 'required', 
            'waypoint_id'     => 'required', 
            'latitude'        => 'required', 
            'longitude'       => 'required', 
            'location_name'       => 'required', 
            'operator_name'   => 'required', 
       ]);

       DB::table('waypoints_categories')->insert([

            'waypoint_name'     => $request->waypoint_name,
            'category_name'     => $request->category_name,
            'sub_cat'           => $request->sub_cat,
            'addrs'             => $request->addrs,
            'postal_code'       => $request->postal_code,
            'additional_info'   => $request->additional_info,
            'country'           => $request->country,
            'province'          => $request->province,
            'waypoint_id'       => $request->waypoint_id,
            'exp_date'          => (!empty($request->exp_dat)) ? $request->exp_dat:'Never Expire',
            'email_id'          => $request->email_id,
            'phone_number'      => $request->phone_number,
            'latitude'          => $request->latitude,
            'longitude'         => $request->longitude,
            'pulse'             => $request->pulse,
            'operater_name'     => $request->operator_name,
            'location_name'     => $request->location_name,
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
        $category = DB::table('waypoints_categories')->where('id',$id)->first();

        return view('admin/waypointscategories/edit')->with('category',$category)->with('heading','edit');
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

            'waypoint_name'   => 'required', 
            'category_name'   => 'required', 
            'sub_cat'         => 'required', 
            'addrs'           => 'required', 
            'country'         => 'required', 
            'province'        => 'required', 
            'waypoint_id'     => 'required', 
            'latitude'        => 'required', 
            'longitude'       => 'required', 
            'location_name'       => 'required', 
            'operator_name'   => 'required', 
        ]);

        DB::table('waypoints_categories')->where('id',$id)->update([

            'waypoint_name'     => $request->waypoint_name,
            'category_name'     => $request->category_name,
            'sub_cat'           => $request->sub_cat,
            'addrs'             => $request->addrs,
            'postal_code'       => $request->postal_code,
            'additional_info'   => $request->additional_info,
            'country'           => $request->country,
            'province'          => $request->province,
            'waypoint_id'       => $request->waypoint_id,
            'exp_date'          => (!empty($request->exp_dat)) ? $request->exp_dat:'Never Expire',
            'email_id'          => $request->email_id,
            'phone_number'      => $request->phone_number,
            'latitude'          => $request->latitude,
            'longitude'         => $request->longitude,
            'pulse'             => $request->pulse,
            'operater_name'     => $request->operator_name,
            'location_name'     => $request->location_name,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
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

    public function notify()
    {
        return view('admin/notify')
                    ->with('heading','notification');
    }
    
    public function send_notification()
    {
        $new_tokens = DB::table('push_notifications_tokens')->get();

        $tokens=array();

        foreach($new_tokens as $new_token)
        {
            $tokens[] = $new_token->token;
        }

        $message = array(
                            "title"   => "Smart Stops",
                            "message" => "This is First Notification From Smart Stops"
                        );

        $url='https://fcm.googleapis.com/fcm/send';
	    $server_key='AAAA-i61uFs:APA91bF6rN4u2ywAr_LQrI3DWoZOXLorEEmi__Z-C4oaSNKxkK65VeovDiAc9lo9daRFZq7KV43Yj9GWI7dHY_mS9umGMhxsM2tnk1sOoCAQvMUbYMb2jWZlY7MI6WvGKC0UY4kWIjJ8';  // put your own server key

		$header=array('Authorization:key='.$server_key,'Content-Type:application/json');

		$field=array('registration_ids'=>$tokens,'data'=>$message);
        $payload=json_encode($field);
	   
	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
       $result = curl_exec($ch);           
       
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       
       Session::flash('success','Notification Has been Send to all users');

       return redirect()->back();
    }
}
