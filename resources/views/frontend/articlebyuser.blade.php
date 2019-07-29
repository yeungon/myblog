@extends('frontend.layout')

@section('title', "Article by {$userauthor->name}")

@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('themes/startbootstrap/img/home-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>A laravel blog </h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">      
  @if(count($articles) > 0)
    <p>You are viewing the articles written by <strong> {{$userauthor->name}} </strong>. There are {{count($articles)}} articles.</p>
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
                
                on September 24, 2019 in {{$article->getCategory->name}}</p>
              </div>
              <hr>           
            </div>
          </div>                  
    @endforeach  
  @else
  <p>You are trying to view the articles written by <strong> {{$userauthor->name}} </strong>. Sorry, the author has not published any article yet.</p>
  @endif
      
     
  
 @endsection