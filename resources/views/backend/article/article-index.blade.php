@extends('backend.layout')
@section('title', "- The articles")
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                  <!-- Flash message after creating the article -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {!!session('status') !!}
                    </div>
                @endif             
                
                <div class="card">                    
                    <div class="card-header"> <a href="{{Route('admin.article.create')}}" class="btn btn-sm btn-primary">Write an article</a></div>
                    <div class="card-body">
                   
                    <h4>Articles: {{count($articles)}}</h4>
                    @if(count($articles) > 0)
                        
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Status</th>
                                <th scope="col">Cateogry</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                        </thead>
                        @php 
                            $count = 0;
                        @endphp    
                        @foreach ($articles as $article)
                        @php 
                            $count++;
                        @endphp                           
                            <tbody>
                                <tr>
                                <th scope="row">{{$count}}</th>                                
                                <td> <a href="{{Route('admin.article.show', ['id' => $article->id])}}">{{$article->title}}</a></td>
                                <td>{{$article->getUser->name}}</td>
                                <td><span>{!!$article->is_publish ? "Publish": "Draft"!!}</span>   </td>
                                <td>{{$article->getCategory->name}}</td>
                                <td><a href="{{Route('admin.article.edit', $article->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                <form action="{{ route('admin.article.destroy', ['id' => $article->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger" type="submit">Delete</button>                  
                                </form>
                                </td>
                                </tr>                                
                            </tbody>                                                
                        @endforeach
                        </table>
                        
                    @endif
                   
                    </div>
                </div>
                
            </div>
        </div>
    </div>



@endsection