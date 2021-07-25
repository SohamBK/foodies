<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Media;
use App\Category;
use Illuminate\Http\Request;
use Gate;
use App\DishCategory;
use App\Restaurent;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function role()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(403,"Sorry, You can't do this actions");
        // }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function blamable()
    {
        Dish::creating(function($dish){
            $dish->created_by = \Auth::id();
        });

        Dish::updating(function($dish){
            $dish->updated_by = \Auth::id();
        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $this->role();

        $column = $request->input('column');
        $keyword = $request->input('search');
        $status = $request->input('status');
        $restaurent = Restaurent::where(['user_id'=>Auth::user()->id])->get();
        //dd($restaurent);
        $dishes = Dish::where(['restaurent_id'=>$restaurent[0]->id])->latest()->search($column,$keyword,$status)->paginate(10)->appends(['column'=>$column,
        'search'=>$keyword,'status'=>$status]);

        // $category = new Category();
        return view('dish.index',['dishes'=>$dishes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->role();
        $categories = Category::where(['status'=>Category::STATUS_ACTIVE])->get();

        $dish = new dish();
        return view('dish.create',['categories'=>$categories]);
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
        
        $dish = new dish();
        $this->blamable();

        $this->validate($request, [
	    	'image_id' => 'nullable | image | mimes:jpeg,bmp,png,jpg | max:1999', //only allow this type extension file.
        ]);
        
        
        
        //Handle File Upload
        if($request->hasFile('image_id')){
            //Get filename with the extension
            $filenamewithExt = $request->file('image_id')->getClientOriginalName();
            
            //Get just filename
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

            //Get just filesize
            $filesize = $request->file('image_id')->getClientSize();
            
            //Get just ext
            $extension = $request->file('image_id')->guessClientExtension();
            
            //FileName to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //Upload Image
            $path = $request->file('image_id')->storeAs('public/uploads/',$fileNameToStore);

           
            if($path)
            {
               $media = new Media;
               $media->alt = $filename;
               $media->file_name = $fileNameToStore;
               $media->file_type = $extension;
               $media->file_size = $filesize;
               $media->status = 10;
               $media->save();
            }

            Dish::creating(function($dish) use ($media){
                $dish->image_id = $media->id;
            });
            
        }

        $restaurent = Restaurent::where(['user_id'=>Auth::user()->id])->get();
        $dish = Dish::create($request->validate([
            'name' => 'required | min:4 | max:100 | string',
            'description' => 'required | string | min:10 | max:255',
            'price'=> 'required | numeric' ,
            'dish_for'=>'required | integer',
            'status' => 'required',
            ])+['restaurent_id'=>$restaurent[0]->id]);


            foreach($request->all('category_id')['category_id'] as $k => $v)
            {
                 DishCategory::create(['categories_id'=>$v,'dish_id'=>$dish->id,'status'=>10]);
            }

        return view('dish.show',['dish' => $dish]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $this->role();
        
        return view('dish.show',['dish'=>$dish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $this->role();

        $categories = Category::where(['status'=>Category::STATUS_ACTIVE])->get();

        return view('dish.edit',['dish' => $dish,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $this->role();
        $dish_id = $dish->id;
        $dish_categories = [];
        foreach($dish->dishCategorys as $dc)
        {
            $dish_categories[] = $dc->categories_id;
        }

       // $dishModel = new dish();
       $dishModel = $dish;
        $this->blamable();

        $this->validate($request, [
	    	'image_id' => 'nullable | image | mimes:jpeg,bmp,png,jpg | max:1999', //only allow this type extension file.
        ]);
        
        //Handle File Upload
        if($request->hasFile('image_id')){
            //Get filename with the extension
            $filenamewithExt = $request->file('image_id')->getClientOriginalName();
            
            //Get just filename
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

            //Get just filesize
            $filesize = $request->file('image_id')->getClientSize();
            
            //Get just ext
            $extension = $request->file('image_id')->guessClientExtension();
            
            //FileName to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //Upload Image
            $path = $request->file('image_id')->storeAs('public/uploads/',$fileNameToStore);

           
            if($path)
            {
               $media = new Media;
               $media->alt = $filename;
               $media->file_name = $fileNameToStore;
               $media->file_type = $extension;
               $media->file_size = $filesize;
               $media->status = 10;
               $media->save();
            }

            Dish::creating(function($dishModel) use ($media){
                $dishModel->image_id = $media->id;
            });
            
        }

        Dish::updating(function($dishModel){
            $dishModel->updated_by = \Auth::id();
        });

        //$model = $dish->update($request->all());
        



        $dish = $dishModel->update($request->validate([
            'name' => 'required | min:4 | max:100 | string',
            'description' => 'required | string | min:10 | max:255',
            'price'=> 'required | numeric' ,
            'dish_for'=>'required | integer',
            'status' => 'required',
            ]));

        $added = array_diff($request->all('category_id')['category_id'],$dish_categories);

        $removed = array_diff($dish_categories,$request->all('category_id')['category_id']);

        foreach($added as $k => $v)
        {
            DishCategory::create(['categories_id'=>$v,'dish_id'=>$dishModel->id,'status'=>10]);
        }
        foreach($removed as $k => $v)
        {
            DishCategory::where(['dish_id'=>$dishModel->id,'categories_id'=>$v])->delete();
        }
            
        return view('dish.show',['dish'=>Dish::findOrfail($dish_id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $this->role();

        $dish->delete(); 
        
        return redirect('/dish');
    }

   
}
