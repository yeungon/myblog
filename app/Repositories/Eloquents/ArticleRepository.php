<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function all(){
        return Article::all();
    }

    public function find($id){
        return Article::findOrFail($id);
    }

    public function getArticlePublishedOrderdbyPaginate($page, $orderby = 'created_at', $sorted = 'desc'){
        
        return Article::where('is_publish', 1)->orderBy($orderby, $sorted)->paginate($page);

    }

    public function getArticlebyAuthor($author){
        return Article::where('author',  $author)->get();
    }

    public function getArticlebyCategory($category){
        return Article::where('category',  $category)->get();
    }
}