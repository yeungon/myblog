<?php

namespace App\Repositories\Contracts;

interface ArticleRepositoryInterface
{
    public function all();
    public function find($id);
}