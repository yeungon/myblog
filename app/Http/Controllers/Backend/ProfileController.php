<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;

class ProfileController extends Controller
{
    
     // Guarding the access
     public function __construct(){
        $this->middleware('auth');
    }
    
    protected function authorized(){
        return Auth::user();
    }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                
        return view('backend.profile.profile-show')->with(['currentuser' => $this->authorized()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
        return view('backend.profile.profile-edit')->with(['currentuser' => $this->authorized()]);

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
        $passwordchange = false;

        if($request->password === null){

            $validator = Validator::make($request->all(), [
                'name'             => 'required|string|max:150',
                'email'            => [
                    'required',
                    // This rule will ignore the current email address when checking the uniqueness.
                    Rule::unique('users')->ignore($id), 
                    ],                                              
               
            ]);
           
    
        }else{

            $validator = Validator::make($request->all(), [
                'name'             => 'required|string|max:150',                            
                'password'         => 'required|confirmed|string|min:8',
                'email'            => [
                                    'required',                                    
                                    Rule::unique('users')->ignore($id), 
                                    ],  
            ]);

            $passwordchange = true;
    
        }
   
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
   
        $user = User::find($id);

        $user->name = trim($request->name);

        $user->is_admin      = $request->role;
        // Given that the registered cannot change her/his role, this input might be null. It cannot be null in database, then here we go.
        if($user->is_admin === null){
            
            $user->is_admin = 0;
        }

        $user->email         = $request->email;

        if($passwordchange === true){
        
            $user->password      = bcrypt($request->password);

        }
        

        $user->save();

        $passwordchangemessage = $passwordchange? "<strong>Password</strong> is also changed!": "";
        
        return redirect()->route('admin.profile.show', ['id' => $id])->with('status', "Your profile <strong>$request->name </strong> is now updated! $passwordchangemessage"); 
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

        return redirect()->route('login')->with('status', "Your profile is now  deleted! Sorry to know :-(");
    }
}
