@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Property edit</h1>
        <form action="{{route('properties.update',$property->id)}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            Titulo
            <br/>
            <input type="text" name="title" value="{{$property->title}}" class="form form-control">
            <br/>
            Description
            <br/>
            <input type="text" name="description" value="{{$property->description}}" class="form form-control">

            Price
            <br/>
            <input type="text" name="price" value="{{$property->price}}" class="form form-control">


            <br/>
            <input type="file" name="photo" id="photo" value="{{$property->photo}}">
            <br/>
            Publicar
            <input type="checkbox" name="publicar" id="publicar" value="{{$property->published}}">
            <br/>
            <br/>
            <input type="submit" class="btn btn-primary" value="Save">
            <br/>
            <br/>
        </form>
        <br/>
    </div>

@endsection
