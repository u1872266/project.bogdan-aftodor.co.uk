@extends('layouts.app')

@section('content')
<div class="top-right links">
                <a href="{{ url('/home') }}">Home</a>
                </div>
<div class="container">

    <div class="row justify-content-center">
    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Explore</div>

                <div class="card-body">
                
                    <div class="row">
                        <div class="col-6">
                            <h1>info</h1>
                            <p>You Selected {{ $City->name }}</p>
                        </div>
                        <div class="col-6">
                            <img src="{{ url($City->images) }}" alt="" style="min-width:100%">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
