@extends('layouts.admin')

@section('content')
    <h1>Tags</h1>
    <br>

    {{ $tags->title }}
    <br>
    {{ $tags->slug }}
@endsection
