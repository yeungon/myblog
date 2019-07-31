<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repositories\Contracts\ArticleRepositoryInterface;


class ArticleController extends Controller
{
    protected $articleRepository;
    // Guarding the access
    public function __construct(ArticleRepositoryInterface $articleRepository){

        $this->articleRepository = $articleRepository;

        $this->middleware('auth');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articleRepository->all();

        $currentuser = Auth::user();

        View::share('currentuser', $currentuser); //Share the view  

        return view('backend.article.article-index')->with(['articles' => $articles]);
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

        $categories = Category::all();      

        return view('backend.article.article-create')->with(['categories' => $categories]);
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
            'title'             => 'required|unique:articles|string|max:150',
            'introduction'      => 'required|string|max:1000',
            'category'          => 'required|string|',
            'content'          => 'required|string|max:10000',
        ]);
        
        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator);
                        
        }

        if($request->is_publish === null){

            $request->is_publish =  0;

        }else{

            $request->is_publish =  1;
        }
        
        $article = new Article;        
        $article->title         = $request->title;
        $article->is_publish    = $request->is_publish;        
        $article->introduction  = $request->introduction;
        $article->category      = $request->category;
        $article->content       = $request->content;
        $article->author        = Auth::id();

        $article->save();
        
        return redirect()->route('admin.article.index')->with('status', 'A new post is created!');
        
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

        $article =  $this->articleRepository->find($id);      

        return view('backend.article.article-show')->with(['article' => $article]);
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

        $article = $this->articleRepository->find($id);      

        $categories = Category::all();        
        
        return view('backend.article.article-edit')->with(['categories' => $categories, 'article' => $article]);
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
            'title'             => 'required|string|max:150',
            'introduction'      => 'required|string|max:1000',
            'category'          => 'required|string',
            'content'          => 'required|string|max:10000',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->is_publish === null){
            $request->is_publish =  0;
        }else{
            $request->is_publish =  1;
        }
        
        $article = Article::find($id);        
        $article->title         = $request->title;
        $article->is_publish    = $request->is_publish;        
        $article->introduction  = $request->introduction;
        $article->category      = $request->category;
        $article->content       = $request->content;
        $article->author        = Auth::id();

        $article->save();
        
        return redirect()->route('admin.article.index')->with('status', "The article <strong>$request->title </strong> is now updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $article = Article::find($id);

        $article->delete();

        return redirect()->route('admin.article.index')->with('status', "Article $article->title has been deleted!");

    }
}
