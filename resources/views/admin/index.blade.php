@extends('layouts.admin')

@section('content')
    <h1>Dashboard</h1>

    @component('components.alert')
        @slot('class')
            alert-danger
        @endslot
        @slot('title')
            Error
        @endslot
        Hello kitty!
    @endcomponent

    <hr>
    <br>
    <p>{{ $message }}</p>
    <br>
    <hr>
    <p>{{ $category->title }}</p>
    <br>
    <p>{!!html_entity_decode($fishtext)!!}</p>
@endsection





