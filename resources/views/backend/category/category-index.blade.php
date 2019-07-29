@extends('backend.layout')
@section('title', "- The category")
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                  
                @if (session('status'))
                    <div class="alert alert-success">
                        {!!session('status') !!}
                    </div>
                @endif             
                
                <div class="card">                    
                    <div class="card-header"> <a href="{{Route('admin.category.create')}}" class="btn btn-sm btn-primary">Create a category</a></div>
                    <div class="card-body">
                   
                    <h4>Categories: {{count($categories)}}</h4>
                    @if(count($categories) > 0)
                        
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>                                
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                        </thead>
                        @php 
                            $count = 0;
                        @endphp 

                        @foreach ($categories as $category)
                            @php 
                                $count++                         
                            @endphp
                            <tbody>
                                <tr>
                                <th scope="row">{{$count}}</th>                                
                                <td> {{$category->name}}</td>
                                
                                <td><a href="{{Route('admin.category.edit', $category->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                <form action="{{ route('admin.category.destroy', ['id' => $category->id])}}" method="post">
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