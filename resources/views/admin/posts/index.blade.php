@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <br>

    {{ $post->title }}
    <br>
    {{ $post->slug }}
@endsection
