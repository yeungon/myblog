@extends('backend.layout')
@section('title', "- Your profile")

@section('content')

<div class="my-3 my-md-5">
          <div class="container">
            <!-- Flash message -->
            @if (session('status'))
            <div class="alert alert-success">
                {!!session('status') !!}
            </div>
            @endif           
            <div class="row">                       
              <div class="col-md-3">                
              </div>  
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Kiora {{$currentuser->name}} - Your current profile</h3>
                  </div>
                  <div class="card-body">                                     
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Name:</label>
                          <div class="col-sm-10">
                              <p>{{$currentuser->name}}</p>
                            
                          </div>
                        </div>
                      </div>                
                      
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Email:</label>
                          <div class="col-sm-10">
                             <p>{{$currentuser->email}}</p>                            
                          </div>
                        </div>
                      </div>          

                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Role:</label>
                          <div class="col-sm-10">
                          <p>{{$currentuser->is_admin? "Admin": "Registered user"}}</p> 
                          </div>
                        </div>
                      </div>    

                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Registered on :</label>
                          <div class="col-sm-10">
                          <p>{{$currentuser->created_at}}</p> 
                          </div>
                        </div>
                      </div>    

                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Article written :</label>
                          <div class="col-sm-10">
                          <p>{{count($currentuser->getArticle)}}</p> 
                          </div>
                        </div>
                      </div>    

                      <div class="btn-list mt-4 text-right">                    
                        <span style="margin-left: 1%"><a href="{{Route('admin.index')}}"><button type="button" class="btn btn-secondary btn-sm btn-space">Cancel</button> </a>
                        <span style="margin-left: 1%"><a href="{{Route('admin.profile.edit', ['id' => $currentuser->id])}}"><button type="button" class="btn btn-primary btn-sm btn-space">Edit</button> </a></span>                       
                                             
                        <form style="display: inline-block; margin-left: 1%" action="{{ route('admin.profile.destroy', ['id' => $currentuser->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger btn-space" type="submit">Delete</button>
                        </form>
                        
                      </div>                                            
                  </div>
                </div>
              </div>
            </div>            
          </div>
          
        </div>
      </div>

      
                              
@endsection