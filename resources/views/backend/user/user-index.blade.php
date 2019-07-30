@extends('backend.layout')
@section('title', "- The users")
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
                    <div class="card-header"> <a href="{{Route('admin.user.create')}}" class="btn btn-sm btn-primary">Create a new user</a></div>
                    <div class="card-body">
                   
                    <h4>User: {{count($users)}}</h4>
                    @if(count($users) > 0)
                        
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">No</th>                                
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Email</th>
                                <th scope="col">Registerd on</th>                                
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                        </thead>
                        @php 
                            $count = 0;
                        @endphp    
                        @foreach ($users as $user)
                        @php 
                            $count++;
                        @endphp                           
                            <tbody>
                                <tr>
                                <th scope="row">{{$count}}</th>                                
                                <td> {{$user->name}}</td>
                                <td><span>{!!$user->is_admin ? "Admin": "Normal user"!!}</span></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>                                
                                <td><a href="{{Route('admin.user.edit', $user->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                <form action="{{ route('admin.user.destroy', ['id' => $user->id])}}" method="post">
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