<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category  = DB::table('waypoints_categories')->count();
        $loactions = DB::table('waypoints_category_details')->count();
        $reviews   = DB::table('app_reviews')->count();

        return view('index')
                    ->with('heading','home')
                    ->with('category', $category)
                    ->with('loactions', $loactions)
                    ->with('reviews',$reviews);
    }
}
