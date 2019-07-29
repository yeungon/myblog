<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Article;
use App\User;
use App\Category;

use Illuminate\Support\Facades\Auth;


class HomeArticleListing extends Controller
{
    public function byUser($user){
        
        $author = User::findOrfail($user);

        $articles = Article::where('author',  $user)->get();

        return view('frontend.articlebyuser')->with(['userauthor'=> $author, 'user' => Auth::user(), 'articles' => $articles]);
    }

    public function byCategory($category){
        
        $articles = Article::where('category',  $category)->get();

        $category = Category::findOrfail($category);

        return view('frontend.articlebycategory')->with(['category'=> $category, 'user' => Auth::user(), 'articles' => $articles]);
    }
}
