<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = DB::table('waypoints_categories')->get();

        return response()->json([

            'success' => 'true',
            'status' => 200,
            'message' => 'All Categories',
            'categories' => $categories,
        ]);
    }

    public function search_categories(Request $request)
    {
        $result = DB::table('waypoints_categories')
            ->where('category_name', 'LIKE', '%' . $request->search_keyword . '%')
            ->orWhere('sub_cat', 'LIKE', '%' . $request->search_keyword . '%')
            ->get();

        if ($result->isEmpty()) {
            return response()->json([

                'success' => 'false',
                'status' => '400',
                'message' => 'No Results Found',
            ]);
        } else {
            return response()->json([

                'success' => 'true',
                'status' => '200',
                'message' => 'Search Result',
                'result' => $result
            ]);
        }
    }

    public function review(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'review' => 'required|integer',
            'feedback' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([

                'success' => 'false',
                'status' => '401',
                'message' => 'Please Review All Fields',
                'errors' => $validate->errors()
            ]);
        }

        DB::table('app_reviews')->insert([

            'reviews' => $request->review,
            'feedback' => $request->feedback,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        return response()->json([

            'success' => 'true',
            'status' => '200',
            'message' => 'Review Uploaded',
        ]);
    }

    public function get_location(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'lat'   => 'required',
            'long'  => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([

                'success' => 'false',
                'status' => '401',
                'message' => 'Please Review All Fields',
                'errors' => $validate->errors()
            ]);
        }

        $latitude = $request->lat;
        $longitude = $request->long;
        $get_way_point = DB::table('waypoints_categories');

        // for km
        $way_points = $get_way_point->whereRaw("( 6371 * acos ( cos ( radians(" . $latitude . ") ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(" . $longitude . ") ) + sin ( radians(" . $latitude . ") ) * sin( radians( latitude ) ) ) <=3.3)")->get();

        return response()->json([

            'success' => 'true',
            'status' => '200',
            'locations' => $way_points,
        ]);
    }
}
