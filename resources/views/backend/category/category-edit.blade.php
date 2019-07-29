@extends('backend.layout')
@section('title', "- Edit category")

@section('content')

<div class="my-3 my-md-5">
          <div class="container">    
          <form action="{{Route('admin.category.update', $category->id)}}" method = "POST">
          @csrf
          @method('PUT')
            <div class="row">                       
              <div class="col-md-3">
                
              </div>
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Edit the category</h3>
                  </div>
                  <div class="card-body">                                     
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Title:</label>
                          <div class="col-sm-10">
                            <input type="text" name = "name" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}" required>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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