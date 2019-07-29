@extends('backend.layout')
@section('title', "- Viewing particular article")

@section('content')

<div class="my-3 my-md-5">
          <div class="container">    
            <div class="row">                       
              <div class="col-md-3">
                <h3 class="page-title mb-5">Article features</h3>                     
                <div>
                  <div class="list-group list-group-transparent mb-0">                                                                    
                    <label class="custom-switch list-group-item list-group-item-action d-flex align-items-center" >
                    <span class="icon mr-3"><i class="fe fe-globe"></i></span>                                               
                    <span class="custom-switch-description">{{$article->is_publish ? "Published": "Draft"}}</span>
                    </label>
                  </div>                
                </div>
              </div>
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">You are viewing the following article:</h3>
                  </div>
                  <div class="card-body">                                     
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Title:</label>
                          <div class="col-sm-10">
                            <p>{{$article->title}}</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Introduction:</label>
                          <div class="col-sm-10">                            
                          <p>{{$article->introduction}}</p>
                          
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row align-items-center">
                          <label class="col-sm-2">Category:</label>
                          <div class="col-sm-10">                                                        
                          <p>{{$article->getCategory->name}}</p>
                         
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
                      <p>{!!$article->content!!}</p>
                     <input type="hidden" name = "author" value="">
                      <div class="btn-list mt-4 text-right">                    
                        <span><a href="{{Route('admin.article.index')}}"><button type="button" class="btn btn-secondary btn-space">Back</button> </a>
                        <a href="{{Route('admin.article.edit', ['id'=> $article->id])}}"><button type="submit" class="btn btn-primary btn-space">Edit</button></a>
                        </span>
                      </div>                        
                    
                  </div>
                </div>
              </div>
            </div>            
          </div>
          
        </div>
      </div>

      
                              
@endsection