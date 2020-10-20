@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Explore</div>

                <div class="card-body">
                
                    <div class="row">
                        <div class="col-6">
                            <h1>{{ $City->city_name }}</h1>

                            <?php
                                if ($City->updated_by !== null):
                            ?> 
                            <p><small>Last updated by {{ $City->name }} @ {{ $City->updated_at }} </small></p>
                            <?php
                                endif;
                            ?>

                            <?php
                                if (Route::currentRouteName() == 'cities.edit'):
                            ?>  
                                <form action="{{ route('cities.update',['id'=>$City->id]) }}" method="POST">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}

                                    <textarea name="text">{{ $City->text }}</textarea>
                                    <input type="submit" class="btn btn-primary btn-block">
                                </form>
                            <?php
                                else:
                            ?>
                                <p>{{ $City->text }}</p>
                            <?php
                                endif;
                            ?>
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
