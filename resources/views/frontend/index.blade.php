@extends('frontend.layout')

@section('title', 'The Home page')

@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('themes/startbootstrap/img/home-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>A laravel blog </h1>
            <span class="subheading">A Blog Theme by Start Bootstrap on top of Laravel 5.8 </span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
  @if(count($articles) > 0)
    @foreach($articles as $article)
        
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
              <a href="{{Route('article', ['id'=>$article->id])}}">
                <h2 class="post-title">
                  {{$article->title}}
                </h2>
                <h3 class="post-subtitle">
                  {{$article->introduction}}
                </h3>
              </a>
              <p class="post-meta">Posted by
                <a href="{{Route('home.article.user', ['id' =>$article->getUser->id])}}"> {{$article->getUser->name}}</a>
                on {{$article->created_at}} in  <a href="{{Route('home.article.category', ['id' =>$article->getCategory->id])}}">{{$article->getCategory->name}}</a></p>
              </div>
              <hr>           
            </div>
          </div>        
    @endforeach  
    <span class='btn float-right'>{{ $articles->links() }}</span>
  @endif
  
     <!-- Pager -->
     <hr>        
  </div>        
       
 @endsection