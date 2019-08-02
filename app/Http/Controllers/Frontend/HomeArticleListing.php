<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class HomeArticleListing extends Controller
{
    protected $userRepository, $categoryRepository, $articleRepository;

    public function __construct(UserRepositoryInterface $userRepository, ArticleRepositoryInterface $articleRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->userRepository       = $userRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->articleRepository    = $articleRepository;
        
    }

    public function byUser($user){
        
        $author = $this->userRepository->find($user);

        $articles = $this->articleRepository->getArticlebyAuthor($user);

        return view('frontend.articlebyuser')->with(['userauthor'=> $author, 'user' => Auth::user(), 'articles' => $articles]);
    }

    public function byCategory($category){
        
        $articles = $this->articleRepository->getArticlebyCategory($category);
        
        $category = $this->categoryRepository->find($category);

        return view('frontend.articlebycategory')->with(['category'=> $category, 'user' => Auth::user(), 'articles' => $articles]);
    }
}
