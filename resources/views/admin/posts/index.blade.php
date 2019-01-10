@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <br>

    @foreach($posts as $post)
        <div class="mb-2 p-1 border border-danger rounded">
            <p>{{ $post->id }}</p>
            <p>{{ $post->title }}</p>
            <p class="text-gray">{{ $post->slug }}</p>
            <p>Category: {{ $post->category->title }}</p>
            @foreach($post->tags as $tag)
                <p>Tags: {{ $tag->title }}</p>
            @endforeach

        </div>
    @endforeach

@endsection
