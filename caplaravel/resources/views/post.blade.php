@extends('layouts.app')
@section('content')
    <h1>Post {{$id}} {{$name}} {{$password}} </h1>
@endsection()  

@section('footer') 
<script>alert("Hi Angel")</script>
@endsection()