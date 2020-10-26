@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                Adding City
                </div>
                

                <div class="card-body">
                    <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="form-group">
                          <label for="city_name">City Name</label>
                          <input type="text" name="city_name" id="input-city_name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="text">City Description</label>
                          <textarea  name="text" id="input-city_text" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                        </div>
                        
                        <div class="form-group">
                          <label for="city_image">Image</label>
                          <input type="file" name="city_image" id="input-images" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">.png, .jpeg, .jpg, .bitmap</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
