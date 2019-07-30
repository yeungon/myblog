<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
       
    // Guarding the access
    public function __construct(){
        $this->middleware('auth');
    }
    
    protected function authorized(){
        return Auth::user();
    }

    public function index()
    {
        
        $users = User::all();
        return view('backend.user.user-index')->with(['users' => $users, 'currentuser' => $this->authorized()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $currentuser = Auth::user();        
        return view('backend.user.user-create')->with(['currentuser' => $this->authorized()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentuser = Auth::user();
        View::share('currentuser', $currentuser); //Share the view 
       
        $validator = Validator::make($request->all(), [
            'name'             => 'required|string|max:150',
            'password'         => 'required|string|min:8|confirmed',            
            'email'            => 'required|unique:users|email'            
          
        ]);
       

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
                
        $user               = new User();
                
        $user->name         = trim($request->name);
        $user->password     = bcrypt($request->password);
        $user->email        = $request->email;               
        $user->is_admin     = $request->role;       

        $user->save();
        
        return redirect()->route('admin.user.index')->with('status', "The new user <strong>$request->name</strong> is created!");
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        View::share('currentuser', $this->authorized()); //Share the view  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
               
        $user = User::findOrFail($id);      
               
        return view('backend.user.user-edit')->with(['user' => $user, 'currentuser' => $this->authorized()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $case = 0;

        if($request->email === null && $request->password === null){

            $validator = Validator::make($request->all(), [
                'name'             => 'required|string|max:150',                                            
               
            ]);

            $case = 1;
    
        }elseif($request->password === null || $request->password_confirmation === null){

            $validator = Validator::make($request->all(), [
                'name'             => 'required|string|max:150',                            
                'email'            => 'email|unique:users'  
               
            ]);

            $case = 2;
    
        }elseif($request->email === null){

            $validator = Validator::make($request->all(), [
                'name'             => 'required|string|max:150',                            
                'password'         => 'string|min:8|confirmed',  
               
            ]);

            $case = 3;    

        }
   
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
   
        $user = User::find($id);
        
        $user->name = $request->name;

        $user->is_admin      = $request->role;
        
        if($case === 2){

            $user->email         = $request->email;

        }elseif($case ===3){
            
            $user->password      = bcrypt($request->password);

        }

        $user->save();
        
        return redirect()->route('admin.user.index')->with('status', "The user <strong>$request->name </strong> is now updated!"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('admin.user.index')->with('status', "User $user->name has been deleted! Noted that the category and articles written by the user are also deleted!");
    }

    
}


