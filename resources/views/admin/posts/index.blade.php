@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <br>

    @foreach ($posts->all() as $post)
        <ul>
            <li>{!! $post->content !!}</li>
        </ul>
    @endforeach
    <br>
    {{--{{ $trans }}--}}
@endsection
