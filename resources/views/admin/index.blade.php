@extends('layouts.admin')

@section('content')
    <h1>Dashboard</h1>
    <hr>
    <br>
    <p>{{ $message }}</p>
    <br>
    <hr>
    <br>
    <p>{!!html_entity_decode($fishtext)!!}</p>
@endsection





