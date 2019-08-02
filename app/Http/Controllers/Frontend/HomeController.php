<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use App\Category;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;



class HomeController extends Controller
{
  
    protected $userRepository, $categoryRepository, $articleRepository;

    public function __construct(UserRepositoryInterface $userRepository, ArticleRepositoryInterface $articleRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->userRepository       = $userRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->articleRepository    = $articleRepository;
        
    }
    protected function getCurrentUser(){
        
        return Auth::user();
    }

    // Displaying the homepage
    public function index(){
        
        
        $articles = $this->articleRepository->getArticlePublishedOrderdbyPaginate(2);
                        
        return view('frontend.index')->with(['articles' => $articles, 'user' => $this->getCurrentUser()]);
    }

    // Displaying a particular article, there are two parameters: name and id
    public function article($id){
        
        $article    = $this->articleRepository->find($id);

        $author     = $article->getUser;

        $category   = $article->getCategory;
                        
        return view('frontend.article')->with(['id'=> $id, 'author'=> $author, 'category' =>$category, 'article' => $article, 'user' => $this->getCurrentUser()]);
    }

    // Displaying the about
    public function about(){

        $authors = $this->userRepository->all();
        
        $articles = $this->articleRepository->all();
        
        $categories = $this->categoryRepository->all();
                        
        return view('frontend.about')->with(['authors' => $authors, 'articles' => $articles, 'categories' => $categories, 'user' => $this->getCurrentUser()]);
    }

    // Displaying the contact
    public function contact(){
                        
        return view('frontend.contact')->with(['user' => $this->getCurrentUser()]);
    }

  
}



