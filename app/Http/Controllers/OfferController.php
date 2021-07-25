<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use Gate;


class OfferController extends Controller
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
        $offers = Offer::latest()->search($column,$keyword)->paginate(10)->appends(['column'=>$column,
        'search'=>$keyword]);

        $offer = new offer();
         return view('offer.index',['offers'=>$offers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->role();

        $offer = new offer();
        return view('offer.create',['offer'=>$offer]);
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

        $request->validate([
            'name' => 'required | min:4 | max:100 | string',
            'description' => 'required | min:25 | max:250 | string',
            'discount_type'=> 'required | numeric',
            'type'=> 'required | numeric',
            'valid_from' => 'required | date',
            'valid_upto' => 'required | date',
            'value' => 'required | numeric',
            'status' => 'required | numeric',
        ]);

        $request->validate([
            'coupon_limit' => ($request->get('discount_type') == 0)?'required | numeric':'',
        ]);

       $offer = Offer::create($request->all());
       return view('offer.show',['offer' => $offer]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(offer $offer)
    {
        $this->role();

        return view('offer.show',['offer'=>$offer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(offer $offer)
    {
        $this->role();

        return view('offer.edit',['offer' => $offer]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, offer $offer)
    {
         $this->role();

        $model = $offer::create($request->validate([
            'name' => 'required | min:4 | max:100 | string',
            'description' => 'required | min:25 | max:250 | string',
            'discount_type'=> 'required | numeric',
            'type'=> 'required | numeric',
            'valid_from' => 'required | date',
            'valid_upto' => 'required | date',
            'value' => 'required | numeric',
            'status' => 'required | numeric',
            
        ]));
        
        Offer::updating(function($offer){
            $offer->updated_by = \Auth::id();
        });

        $model = $offer->update($request->all());
        return view('offer.show',['offer'=>Offer::findOrfail($offer->id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(offer $offer)
    {
        $this->role();
        
        $offer->delete(); 
        
        return redirect('/offer');
    }
}
