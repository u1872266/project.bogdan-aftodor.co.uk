@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Explore</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <?php
                        foreach ($Cities as $City): ?>

                        <p>{{$City->name}}</p>

                    <a href="{{ route('city',array('id'=>$City->id)) }}"><img src="{{ url($City->images) }}" alt="" style="min-width:100%"></a>
                    



                    <?php
                        endforeach;
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
