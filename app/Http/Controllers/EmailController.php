<?php

namespace App\Http\Controllers;

use App\Email;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Gate;


class EmailController extends Controller
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
        Email::creating(function($email){
            $email->created_by = \Auth::id();
        });

        Email::updating(function($email){
            $email->updated_by = \Auth::id();
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
        $emails = Email::latest()->search($column,$keyword)->paginate(10)->appends(['column'=>$column,'search'=>$keyword]);

        $email = new Email();
         return view('email.index',['emails'=>$emails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->role();

        $email = new Email();
        return view('email.create',['email'=>$email]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(config('MAIL_USERNAME','sohamtesting2@gmail.com'));
        $this->role();

        $this->blamable();

        Email::creating(function($email){
            // $email->status = Email::EMAIL_UNSEND;
            $email->from = config('MAIL_USERNAME','sohamtesting2@gmail.com');
        });
        $request->validate([
            'to' => 'string',
            'cc'=> 'string',
            'bcc' => 'string',
            'from' => 'string | email',
            'subject' => 'required | string',
            'body' => 'required | min:10 | max:10000',
        ]);
        //dd($request['to']);
        $emails = explode(',',$request['to']);
        array_pop($emails);
        //dd($emails);

        foreach($emails as $email)
        {
            $emailModel = Email::create($request->validate([
                'cc'=> 'string',
                'bcc' => 'string',
                'subject' => 'required | string',
                'body' => 'required | min:10 | max:10000',
            ]) + ['to' => trim($email),'status' => Email::EMAIL_SEND]);
        }

        $emails = Email::where(['status'=>Email::EMAIL_UNSEND])->get();
        foreach($emails as $email){
            \Mail::to($email->to)
                ->cc($email->cc)
                ->bcc($email->bcc)
                ->queue(new \App\Mail\SendEmail($email));
                }

                // Email::created(function($email) use ($emailModel){
                //     Email::where('id', $emailModel->id)->update(array('status' => Email::EMAIL_SEND));
                // });

        return redirect('/email');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        $this->role();

        return view('email.show',['email'=>$email]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        $this->role();

        $this->blamable();

        return view('email.edit',['email' => $email]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        $this->role();

        Email::updating(function($email){
            $email->updated_by = \Auth::id();
        });

        $model = $email->update($request->all());

        $model = $email::create($request->validate([
            'to' => 'required | email',Rule::unique('emails')->ignore($email->id),
            'cc'=> 'required',
            'bcc' => 'required',
            'from' => 'required | email',Rule::unique('emails')->ignore($email->id),
            'subject' => 'required | string',
            'body' => 'required | min:10 | max:10000',
            
        ]));

        return view('email.show',['email'=>Email::findOrfail($email->id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        $this->role();

        $email->delete(); 
        
        return redirect('/email');
    }

    public function senders(Request $request)
    {
        $this->role();

        $selected = $request->all('selected');
        $models = User::where(['role'=>$selected['selected']])->get();
        $users = [];
        foreach($models as $model)
        {
            $users[] = $model->email;
        }

        return json_encode($users);
        
    }
}
