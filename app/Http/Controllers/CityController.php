<?php

namespace App\Http\Controllers;

use App\City;
use App\CityArea;
use Illuminate\Http\Request;
use Gate;


class CityController extends Controller
{
    public function role()
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You can't do this actions");
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->role();

        $column = $request->input('column');
        $keyword = $request->input('search');
        $status = $request->input('status');
        $cities = City::latest()->search($column,$keyword,$status)->paginate(10)->appends(['column'=>$column,
        'search'=>$keyword,'status'=>$status]);
        return view('city.index',['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->role();

        $city = new City();
        return view('city.create',['city'=> $city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->role();     
        
        City::creating(function($city){
            $city->created_by = \Auth::id();
        });

        $request->validate([
            'name' => 'required | max:100 | string',
            'city_areas' => 'required | array ',
            'status' => 'required',
        ]);

       $city = City::create($request->validate([
        'name' => 'required | max:100 | string',
        'status' => 'required',
        ]));

       if($request->all('city_areas')['city_areas']){
            foreach($request->all('city_areas')['city_areas'] as $k => $v)
            {
                    CityArea::create(['name'=>$v,'city_id'=>$city->id,'status'=>10]);
            }
        }

       return view('city.show',['city' => $city]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        $this->role();

        return view('city.show',['city' => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(city $city)
    {
        $this->role();

        return view('city.edit',['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, city $city)
    {
        // dd($city->cityAreas->map(['id']));
         //dd($request->all('city_areas')['city_areas']);
        $this->role();

        City::updating(function($city){
            $city->updated_by = \Auth::id();
        }); 
        $request->validate([
            'name' => 'required | max:100 | string',
            'city_areas' => 'required | array ',
            'status' => 'required',
        ]);

        $model = $city->update($request->validate([
            'name' => 'required | max:100 | string',
            'status' => 'required',
        ]));

        $cityAreas_id = [];
        foreach($city->cityAreas as $cityAreas)
        {
            $cityAreas_id[]=$cityAreas->id;
        }

        if($request->all('city_areas')['city_areas']){
            $added = array_diff($request->all('city_areas')['city_areas'],$cityAreas_id);

            $removed = array_diff($cityAreas_id,$request->all('city_areas')['city_areas']);

            foreach($added as $k => $v)
            {
                CityArea::create(['name'=>$v,'city_id'=>$city->id,'status'=>10]);
            }
            foreach($removed as $k => $v)
            {
                CityArea::find($v)->delete();
            }
        }

       return view('city.show',['city' => City::findOrfail($city->id)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(city $city)
    {
        $this->role();
        
        $city->delete(); 
        
        return redirect('/city');
    }
}
