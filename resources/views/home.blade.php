@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                Explore
                <a href="{{ route('cities.create') }}" class="btn float-right">Add City</a>
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <?php
                        foreach ($Cities as $City): ?>

                        <p>{{$City->city_name}}</p>

                   <img src="{{ url('images/'.$City->images) }}" alt="" style="min-width:100%">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('cities.show',array('id'=>$City->id)) }}" type="button" class="btn btn-secondary"><i class="fas fa-search"></i></a>
                        <a href="{{ route('cities.edit',array('id'=>$City->id)) }}" type="button" class="btn btn-secondary"><i class="fas fa-edit"></i></a>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#areyousure-{{ $City->id }}">
                        <i class="fas fa-trash-restore-alt"></i>
                            
                        </button>

                        <div class="modal fade" id="areyousure-{{ $City->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <form action="{{ route('cities.destroy',['id'=>$City->id]) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger" value="Yes, Delete!">
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    <?php
                        endforeach;
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
