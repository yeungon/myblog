@extends('backend.layout')
@section('title', "- Manage the blog")

@section('content')    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Statistics</h3></div>

                    <dashboard-component></dashboard-component>

                    <div class="card-body">
                        <h4>Users: {{count($users)}}</h4>
                    @if(count($users) > 0)
                        <ul>
                            @foreach ($users as $user)
                            <li>
                                {{$user->name}}
                            </li>
                            @endforeach
                        </ul>
                    @endif
                    <hr>
                    <h4>Articles: {{count($articles)}}</h4>
                    @if(count($articles) > 0)
                        <ul>
                        @foreach ($articles as $article)
                         <li> {{$article->title}}   </li>                     
                        @endforeach
                        </ul>
                    @endif

                    <hr>
                    <h4>Categories: {{count($categories)}}</h4>
                    @if(count($categories) > 0)
                        <ul>
                        @foreach ($categories as $category)
                             <li> {{$category->name}}</li>
                        
                        @endforeach
                        </ul>

                    @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection