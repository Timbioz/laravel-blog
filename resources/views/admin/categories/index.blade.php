@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    <br>

    {{ $category->title }}
    <br>
    {{ $category->slug }}
@endsection
