<?php

namespace App\Http\Controllers;

use App\Category;
use App\Media;
use Illuminate\Http\Request;
use Gate;


class CategoryController extends Controller
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

    public function blamable()
    {
        Category::creating(function($category){
            $category->created_by = \Auth::id();
        });

        Category::updating(function($category){
            $category->updated_by = \Auth::id();
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
        $categories = Category::latest()->search($column,$keyword,$status)->paginate(10)->appends(['column'=>$column,
        'search'=>$keyword,'status'=>$status]);

        // $category = new Category();
        return view('category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->role();

        $category = new category();
        return view('category.create',['category'=>$category]);
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

        $category = new Category();
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

            //dd($media); 
            Category::creating(function($category) use ($media){
                $category->image_id = $media->id;
            });
        }

        $category = Category::create($request->validate([
            'name' => 'required | min:4 | max:100 | string',
            'description' => 'required | string | min:10 | max:255',
            'status' => 'required',
            ]));

        return view('category.show',['category' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $this->role();

        return view('category.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->role();

        return view('category.edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->role();

        $this->blamable();

        $this->validate($request, [
	    	'image_id' => 'nullable | image | max:1999', //only allow this type extension file.
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
            //dd('hii');
               $media = new Media;
               $media->alt = $filename;
               $media->file_name = $fileNameToStore;
               $media->file_type = $extension;
               $media->file_size = $filesize;
               $media->status = 10;
               $media->save();
            }
            Category::saving(function($category) use ($media){
                    $category->image_id = $media->id;
            });
        }

        Category::updating(function($category){
            $category->updated_by = \Auth::id();
        });

        $model = $category->update($request->all());

       return view('category.show',['category' => Category::findOrfail($category->id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->role();
        
        $category->delete(); 
        
        return redirect('/category');
    }
}
