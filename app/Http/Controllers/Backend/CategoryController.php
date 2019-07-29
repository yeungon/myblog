<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    
    // Guarding the access
      public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentuser = Auth::user();
        View::share('currentuser', $currentuser); //Share the view  

        $categories = Category::all();
        return view('backend.category.category-index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $currentuser = Auth::user();
        View::share('currentuser', $currentuser); //Share the view  
        return view('backend.category.category-create');
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
            'name'             => 'required|unique:categories|string|max:150',
          
        ]);
       

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
                
        $category           = new Category();
        $category->name     = $request->name;               
        $category->author   = Auth::id();

        $category->save();
        
        return redirect()->route('admin.category.index')->with('status', "The new category <strong>$request->name</strong> is created!");
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentuser = Auth::user();
        View::share('currentuser', $currentuser); //Share the view  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentuser = Auth::user();
        View::share('currentuser', $currentuser); //Share the view
        
        $category = Category::findOrFail($id);      
               
        return view('backend.category.category-edit')->with(['category' => $category]);
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
        $currentuser = Auth::user();
        View::share('currentuser', $currentuser); //Share the view 
        
        $validator = Validator::make($request->all(), [
            'name'             => 'required|string|max:150',
           
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
   
        $category = Category::find($id);        
        $category->name         = $request->name;
        $category->author        = Auth::id();

        $category->save();
        
        return redirect()->route('admin.category.index')->with('status', "The category <strong>$request->name </strong> is now updated!"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('admin.category.index')->with('status', "Category $category->name has been deleted! Noted that the articles of the category are also deleted!");
    }
}
