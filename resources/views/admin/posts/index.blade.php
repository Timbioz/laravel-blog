@extends("layouts.admin")

@section('content')
    <h1>Posts</h1>
    <br>

    {{ $post->slug }}
    <br>
    {{ $trans }}
@endsection
