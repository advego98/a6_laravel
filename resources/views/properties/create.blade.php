@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">New Property</h1>
        <form action="{{route('properties.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            Title
            <br/>
            <input type="text" name="title" value="" class="form form-control" required>
            <br/>
            Description
            <br/>
            <input type="text" name="description" value="" class="form form-control" required>
            Price
            <br/>
            <input type="text" name="price" value="" class="form form-control" required>


            <br/>
            <input type="file" name="photo">
            <br/>
            Publicar
            <input type="checkbox" id="publicar">
            <br/>
            <br/>
            <input type="submit" class="btn btn-primary" value="Save">
            <br/>
            <br/>
        </form>
        </br>
    </div>

@endsection
