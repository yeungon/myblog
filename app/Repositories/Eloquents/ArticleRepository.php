<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function all()
    {
        return Article::all();
    }

    public function find($id)
    {
        return Article::findOrFail($id);
    }
}