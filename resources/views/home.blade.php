@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hi {{ Auth::user()->name }}, you are logged in!
                    
                    <category-component :username = {{ Auth::user()->name }}></category-component>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
