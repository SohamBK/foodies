<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Media;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function role()
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You can't do this actions");
        }
    }

    public function blamable()
    {
        User::creating(function($user){
            $user->created_by = \Auth::id();
        });

        User::updating(function($user){
            $user->updated_by = \Auth::id();
        });
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
        $users = User::latest()->search($column,$keyword)->paginate(10)->appends(['column'=>$column,
        'search'=>$keyword]);

        return view('user.list',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->role();

        $user = new User();
        return view('user.create',['users'=>$user]);

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

        $user = new User();
        $this->blamable();

        $this->validate($request, [
	    	'media_id' => 'nullable | image | mimes:jpeg,bmp,png | max:1999', //only allow this type extension file.
        ]);
        
        
        //Handle File Upload
        if($request->hasFile('media_id')){
            //Get filename with the extension
            $filenamewithExt = $request->file('media_id')->getClientOriginalName();
            
            //Get just filename
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

            //Get just filesize
            $filesize = $request->file('media_id')->getClientSize();
            
            //Get just ext
            $extension = $request->file('media_id')->guessClientExtension();
            
            //FileName to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //Upload Image
            $path = $request->file('media_id')->storeAs('public/uploads/',$fileNameToStore);

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
            User::creating(function($user) use ($media){
                $user->media_id = $media->id;
            });
        }
            // dd($request->validate([
            //     'username' => 'required | min:4 | max:100 | string',
            //     'first_name' => 'required | min:4 | max:100 | string',
            //     'last_name' => 'required | min:4 | max:100 | string',
            //     'email' => 'required | email | unique:users,email' ,
            //     'mobile' => 'required | numeric | unique:users,mobile' ,
            //     'role' => 'required | string',
            //     'password' => 'required | min:6 | max:100', 
            //     'status' => 'required',
            // ]));
        $model = $user::create($request->validate([
            'username' => 'required | min:4 | max:100 | string',
            'first_name' => 'required | min:4 | max:100 | string',
            'last_name' => 'required | min:4 | max:100 | string',
            'email' => 'required | email | unique:users,email' ,
            'mobile' => 'required | numeric | unique:users,mobile' ,
            'role' => 'required | string',
            //'password' => 'required | min:6 | max:100', 
            'status' => 'required',
        ])+['password' => bcrypt($request->all('password')['password'])]);

        return view('user.show',['user'=>$model]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $this->role();

        return view('user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $this->role();

        return view('user.update',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $this->role();

        $this->blamable();

        $this->validate($request, [
	    	'media_id' => 'nullable | image | max:1999', //only allow this type extension file.
        ]);
        
        
        //Handle File Upload
        if($request->hasFile('media_id')){

            //Get filename with the extension
            $filenamewithExt = $request->file('media_id')->getClientOriginalName();
            
            //Get just filename
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

            //Get just filesize
            $filesize = $request->file('media_id')->getClientSize();
            
            //Get just ext
            $extension = $request->file('media_id')->guessClientExtension();
            
            //FileName to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //Upload Image
            $path = $request->file('media_id')->storeAs('public/uploads/',$fileNameToStore);

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
            User::saving(function($user) use ($media){
                    $user->media_id = $media->id;
                   // $user->update(['media_id' => $media->id]);
            });
        }

        // dd($request->validate([
        //     'username' => 'required | min:4 | max:100 | string',
        //     'first_name' => 'required | min:4 | max:100 | string',
        //     'last_name' => 'required | min:4 | max:100 | string',
        //     'email' => 'required | email | ',Rule::unique('users')->ignore($user->id),
        //     'mobile' => 'required | numeric | ',Rule::unique('users')->ignore($user->id),
        //     'password' => 'required | min:6 | max:100', 
        //     'status' => 'required',            
        // ]));

            $model = $user->update($request->validate([
            'username' => 'required | min:4 | max:100 | string',
            'first_name' => 'required | min:4 | max:100 | string',
            'last_name' => 'required | min:4 | max:100 | string',
            'email' => 'required | email | ',Rule::unique('users')->ignore($user->id),
            'mobile' => 'required | numeric | ',Rule::unique('users')->ignore($user->id),
            //'password' => 'required | min:6 | max:100', 
            'status' => 'required',            
        ])+['password' => bcrypt($request->all('password')['password'])]);

        if($model)
        {
            \Session::flash('message', 'User updated successfully !'); 
            \Session::flash('alert-class', 'alert-success');
        }
        return view('user.show',['user'=>User::findOrfail($user->id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $this->role();
        
        $user->delete();

        return redirect('/user');
    }
}
