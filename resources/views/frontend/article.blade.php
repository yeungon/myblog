@extends('frontend.layout')

@section('title', $article->title)

@section('content')

  @if($article)
        <!-- Page Header -->
    
        <header class="masthead" style="background-image: url('{{asset('themes/startbootstrap/img/post-bg.jpg')}}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>{{$article->title}}</h1>
              <h2 class="subheading">{{$article->introduction}}</h2>
              <span class="meta">Posted by
                <a href="{{Route('home.article.user', ['id'=>$author->id])}}">{{$author->name}}</a>
                on {{$article->created_at}} in the <a href="{{Route('home.article.category', ['id'=>$category->id])}}">{{$category->name}}</a></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            {!!$article->content!!}
          </div>
        </div>
      </div>
    </article>

    <hr>
    @else
    <p class = "erro">Sorry, no article is found!</p>
  @endif

@endsection