@extends('frontend.layout')

@section('title', 'The about page')

@section('content')
  
<!-- Page Header -->
<header class="masthead" style="background-image: url('{{asset('themes/startbootstrap/img/home-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>About Me</h1>
            <span class="subheading">Kiora! This is a blog written on Laravel 5.8 by Vuong Nguyen</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        We currently have {{count($categories)}} categories, {{count($authors)}} authors and {{count($articles)}} articles. Kindly click on the name of the author, category or article fore more detail.
        <br>
        <br>
        The blog is written on Laravel 5.8, <a href = "https://startbootstrap.com/themes/clean-blog">Clean blog </a>theme on the front and <a href = "https://tabler.io/">Tabler </a>theme on the dashboard.
        <br>
        <hr>

        <h5>Author: </h5>
        @if(count($authors) > 0)
          <ul>
            @foreach($authors as $author)
              <li><a href="{{Route('home.article.user', ['id' => $author->id])}}">{{$author->name}}</a></li>
            @endforeach
          </ul>
        @endif
        <hr>
        <h5>Categories: </h5>
        @if(count($categories) > 0)
          <ul>
            @foreach($categories as $category)
              <li><a href="{{Route('home.article.category', ['category' => $category->id])}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
          @endif
          <hr>
        <h5>Articles: </h5>
        @if(count($articles) > 0)
          <ul>  
            @foreach($articles as $article)             
              <li><a href="{{Route('article', ['id' => $article->id])}}">{{$article->title}}</a></li>
            @endforeach
          </ul>
        @endif
        <br>
        
      </div>
    </div>
  </div>

  <hr>

 @endsection