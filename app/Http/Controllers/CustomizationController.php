<?php

namespace App\Http\Controllers;

use App\Customization;
use Illuminate\Http\Request;
use App\CustomizationOption;

class CustomizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('customization.create', ['dish_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = Customization::create($request->validate([
            'dish_id' => 'required | integer',
            'name' => 'required | string',
            'status' => 'required | integer']));

        return redirect('/dish/'.$model->dish_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customization  $customization
     * @return \Illuminate\Http\Response
     */
    public function show(Customization $customization)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customization  $customization
     * @return \Illuminate\Http\Response
     */
    public function edit(Customization $customization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customization  $customization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customization $customization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customization  $customization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customization $customization)
    {
        //
    }

    public function optionstore(Request $request)
    {
        $customization = CustomizationOption::where(['customization_id'=>$request->all('customization_id')['customization_id']])->count();
        if($customization < 5){
            $model = CustomizationOption::create($request->validate([
                'customization_id' => 'required | integer',
                'name' => 'required | string',
                'price' => 'required | integer']) + ['status'=>10]);
        }else{
            \Session::flash('message', 'You can only save 5 Customiztion Options !'); 
            \Session::flash('alert-class', 'alert-danger');
        }

        return redirect('/dish/'.$request->all('dish_id')['dish_id']);
    }
}
