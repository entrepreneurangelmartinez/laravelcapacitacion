@extends('layouts.app')
@section('content')
    <h1>Post {{$id}} {{$name}} {{$password}} </h1>
    @if(count($people))
    <p>La cantidad actual es de {{count($people)}}</p>
    <ul>
    @foreach($people as $person)
     <li>{{$person}}</li>
    @endforeach
    </ul>
    @endif
@endsection()  

@section('footer') 
<script>alert("Hi Angel")</script>
@endsection()