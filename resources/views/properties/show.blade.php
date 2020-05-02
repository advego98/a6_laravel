@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">{{$property->title}}</h1>
        <a class="btn btn-primary" href="{{route('welcome')}}">Volver</a>
        <br/>
        @if($property->photo!=null)<img src="{{asset('storage/'.$property->photo)}}" width="150px">@endif
        <p><b>Precio: </b>{{$property->price}} €</p>
        <p><b>Descripción: </b>{{$property->description}}</p><br/><br/><br/>
        <h3>Contacto</h3>
        <p><b>Propietaio: </b>{{$nombre->name}}</p>
        <p><b>Correo: </b>{{$nombre->email}}</p>

    </div>

@endsection