<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>LaraApp Admin @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

      <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
       
    
    <link href="{{asset('backend/tabler/assets/css/dashboard.css')}}" rel="stylesheet" />
 
    
  </head>
  <body class="">
    <div id = "app"> 
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="{{Route('admin.index')}}">
                <img src="{{asset('backend/tabler/demo/brand/tabler.svg')}}" class="header-brand-img" alt="tabler logo">
              </a>
                           
              <div class="d-flex order-lg-2 ml-auto">                
                <div class="dropdown d-none d-md-flex">                    
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{asset('backend/tabler/demo/faces/male/21.jpg')}}"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{$currentuser->name}}</span>
                      <small class="text-muted d-block mt-1">
                      {{$currentuser->is_admin? "Admin": "Registered user"}}  
                      </small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="{{Route('admin.profile.show', ['id' => $currentuser->id])}}">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>                    
                    <a class="dropdown-item" href="{{Route('logoutsystem')}}">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="The search is being implemented&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div>

              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

                @if($currentuser->is_admin)
                  <li class="nav-item">
                    <a href="{{Route('homepage')}}" class="nav-link"><i class="fe fe-globe"></i> Home</a>
                    </li>

                    <li class="nav-item">
                      <a href="{{Route('admin.index')}}" class="nav-link {{ (request()->routeIs('admin.index')) ? 'active' : '' }}"><i class="fe fe-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{Route('admin.user.index')}}" class="nav-link {{ (request()->routeIs('admin.user.index')) ? 'active' : '' }}" ><i class="fe fe-users"></i> Users</a>                    
                    </li>
                    <li class="nav-item dropdown">
                      <a href="{{Route('admin.category.index')}}" class="nav-link {{ (request()->routeIs('admin.category.index')) ? 'active' : '' }}"><i class="fe fe-calendar"></i> Categories</a>                    
                    </li>
                    <li class="nav-item dropdown">
                      <a href="{{Route('admin.article.index')}}" class="nav-link {{ (request()->routeIs('admin.article.index')) ? 'active' : '' }}" ><i class="fe fe-file"></i> Articles</a>                   
                    </li>    
                    
                    <li class="nav-item dropdown">
                      <a href="{{Route('admin.article.create')}}" class="nav-link {{ (request()->routeIs('admin.article.create')) ? 'active' : '' }}"><i class="fe fe-send"></i> Write</a>                    
                    </li>                 

                    <li class="nav-item dropdown">
                    <a href="{{Route('admin.profile.show', ['id' => $currentuser->id])}}" class="nav-link {{ (request()->routeIs('admin.profile.show')) ? 'active' : '' }}"><i class="fe fe-user"></i> Profile</a> 
                    </li>                                
                @else
                  <li class="nav-item">
                    <a href="{{Route('homepage')}}" class="nav-link"><i class="fe fe-globe"></i> Home</a>
                    </li>

                    <li class="nav-item">
                      <a href="{{Route('admin.index')}}" class="nav-link {{ (request()->routeIs('admin.index')) ? 'active' : '' }}"><i class="fe fe-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a href="{{Route('admin.profile.show', ['id' => $currentuser->id])}}" class="nav-link {{ (request()->routeIs('admin.profile.show')) ? 'active' : '' }}"><i class="fe fe-user"></i> Profile</a> 
                    </li>

                @endif                                                 

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="my-3 my-md-5">
        </div>
      </div>

        @yield('content')

     
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="row">
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">                    
                    <li>
                    
                    <a href="{{Route('logoutsystem')}}" class="nav-link"><i class="fe fe-power"></i> Sign out</a>
                    </li> 
                    
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                  
                </div>
                <div class="col-6 col-md-3">
                  
                </div>
                <div class="col-6 col-md-3">
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
              LaraApp - A blog that works!
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
              <div class="row align-items-center">                
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2019 <a href=".">Tabler</a>. Theme by <a href="https://codecalm.net" target="_blank">codecalm.net</a> All rights reserved. Developed by Vuong.
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script type="text/javascript" src="{{ asset('js/tinymce.min.js') }}" >
  
  tinymce.init({
        editor_selector : "mceEditor",
        selector: '#contentbody'
      });
      
  </script>

  </body>
  
</html>