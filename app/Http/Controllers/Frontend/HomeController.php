<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use App\Category;



class HomeController extends Controller
{
  
    protected function getCurrentUser(){
        
        return Auth::user();
    }

    // Displaying the homepage
    public function index(){
        
        
        $articles = Article::where('is_publish', 1)->orderBy('created_at', 'desc')->paginate(2);
        
                
        return view('frontend.index')->with(['articles' => $articles, 'user' => $this->getCurrentUser()]);
    }

    // Displaying a particular article, there are two parameters: name and id
    public function article($id){
        
        $article = Article::findOrFail($id);

        $author = Article::findOrFail($id)->getUser;

        $category = Article::findOrFail($id)->getCategory;
                        
        return view('frontend.article')->with(['id'=> $id, 'author'=> $author, 'category' =>$category, 'article' => $article, 'user' => $this->getCurrentUser()]);
    }

    // Displaying the about
    public function about(){

        $authors = User::all();

        $articles = Article::all();
        
        $categories = Category::all();
                        
        return view('frontend.about')->with(['authors' => $authors, 'articles' => $articles, 'categories' => $categories, 'user' => $this->getCurrentUser()]);
    }

    // Displaying the contact
    public function contact(){
                        
        return view('frontend.contact')->with(['user' => $this->getCurrentUser()]);
    }

  
}



