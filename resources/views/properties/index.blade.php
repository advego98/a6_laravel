@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Properties</h1>
        <a class="btn btn-primary" href="{{route('properties.create')}}">Create Property</a>
        <br/>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th><Image></Image></th>
                <th></th>
            </tr>
            @foreach($properties as $property)
                <tr>
                    <td>{{$property->title}}</td>
                    <td>{{$property->price}} €</td>
                    <td>
                        @if($property->photo!=null)<img src="{{asset('storage/'.$property->photo)}}" width="150px">@endif
                    </td>
                    <td>
                    <form action="{{route('properties.destroy',$property->id)}}" method='POST'>
                        @csrf
                        @method("DELETE")
                        <a class="btn btn-primary" href="{{route('properties.edit',$property->id)}}">Edit</a>
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                    </td>
                </tr>
            @endforeach

            </thead>
        </table>
    </div>

@endsection