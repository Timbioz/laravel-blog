@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    <br>

    {{ $categories->title }}
    <br>
    {{ $categories->slug }}
@endsection
