@extends('backend.layout')
@section('title', "- Editing particular article")

@section('content')

<div class="my-3 my-md-5">
          <div class="container">
          <form action="{{Route('admin.article.edit', ['id' => $article->id])}}" method = "POST">
          @csrf    
          @method('PUT')
            <div class="row">                       
              <div class="col-md-3">
                <h3 class="page-title mb-5">Article features</h3>                     
                <div>
                  <div class="list-group list-group-transparent mb-0">                                                                    
                    <label class="custom-switch list-group-item list-group-item-action d-flex align-items-center" >
                    <span class="icon mr-3"><i class="fe fe-globe"></i></span>                                               
                        <input type="checkbox" name="is_publish" class="custom-switch-input" {{$article->is_publish ? 'checked': ''}}>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Published</span>
                    </label>
                   
                  </div>                
                </div>
              </div>
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">You are editing the following article:</h3>
                  </div>
                  <div class="card-body">                                     
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Title:</label>
                          <div class="col-sm-10">
                            
                            <input type="text" name = "title" class="form-control @error('title') is-invalid @enderror" value="{{$article->title}}" required>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Introduction:</label>
                          <div class="col-sm-10">                            
                            <textarea rows="4" class="form-control @error('introduction') is-invalid @enderror" name = "introduction" value="{{ old('introduction') }}"  required>{{$article->introduction}}</textarea>
                                @error('introduction')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Category:</label>
                          <div class="col-sm-10">                                                        
                          <select name="category" id="select-category" class="form-control custom-select @error('category') is-invalid @enderror" value="{{ old('category') }}"  required>                            
                                @if(count($categories) > 0)                                    
                                    <option value="" disabled selected>Please select the category</option>
                                    @foreach($categories as $category)                                
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif

                                @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                            </select>
                         
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Author:</label>
                          <div class="col-sm-10">                                                                                  
                          <p> {{$article->getUser->name}}</p>
                          </div>
                        </div>
                      </div>
                    

                      <textarea rows="20" class="form-control @error('content') is-invalid @enderror" name = "content" value="{{ old('content') }}"  required>  {!!$article->content!!}</textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                     
                      <div class="btn-list mt-4 text-right">                    
                        <span><a href="{{Route('admin.article.index')}}"><button type="button" class="btn btn-secondary btn-space">Cancel</button> </a>
                        <a href="{{Route('admin.article.update', ['id' => $article->id])}}"><button type="submit" class="btn btn-primary btn-space">Update</button></a>
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