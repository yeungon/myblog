@extends('backend.layout')
@section('title', "- Create a user")

@section('content')

<div class="my-3 my-md-5">
          <div class="container">    
          <form action="{{Route('admin.user.store')}}" method = "POST">
          @csrf
            <div class="row">                       
              <div class="col-md-3">
                
              </div>
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Create a new user</h3>
                  </div>
                  <div class="card-body">                                     
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Title:</label>
                          <div class="col-sm-10">
                            <input type="text" name = "name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Password:</label>
                          <div class="col-sm-10">
                            <input type="password" name = "password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Password confirm:</label>
                          <div class="col-sm-10">
                            <input type="password" name = "password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" required>
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                          </div>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Email:</label>
                          <div class="col-sm-10">
                            <input type="text" name = "email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Role:</label>
                          <div class="col-sm-10">                                                        
                            <select name="role" id="select-role" class="form-control custom-select @error('role') is-invalid @enderror" value="{{ old('message') }}"  required>                            
                                                                    
                                    <option value="" disabled selected>Please select the role</option>                                
                                     <option value="1">Admin</option>
                                     <option value="0">User</option>                                
                                     @error('role')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                                                
                            </select>
                          </div>
                        </div>
                      </div>


                     
                      <div class="btn-list mt-4 text-right">                    
                        <span><a href="{{Route('admin.category.index')}}"><button type="button" class="btn btn-secondary btn-space">Cancel</button> </a>
                        <button type="submit" class="btn btn-primary btn-space">Save</button>
                        </span>
                      </div>                        
                    
                  </div>
                </div>
              </div>
            </div>            
          </div>
          </form>
        </div>
      </div>
                              
@endsection