<?php

namespace App\Http\Controllers\Backend;
use App\User;
use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class AdminController extends Controller
{
    // Guarding the access
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $users = User::all();
        $categories = Category::all();
        $articles = Article::all();
        $currentuser = Auth::user();
        View::share('currentuser', $currentuser); //Share the view
        return view('backend.index')->with(['currentuser'=> $currentuser, 'users' => $users, 'categories' => $categories, 'articles' => $articles]);
    }
}
