<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\City;
use App\CityArea;
use App\Category;


class HomeController extends Controller
{
    public function role()
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You can't do this actions");
        }
    }

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.index-front');
       // return view('layouts.dashboard');
    }

}
