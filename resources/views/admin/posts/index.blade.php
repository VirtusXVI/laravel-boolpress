@extends('layouts.dashboard')

@section('content')
    @foreach ($posts as $post)
        <div>
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>
            <a href="{{ route('admin.posts.show', $post->id) }}">Scopri Di Più</a>
            <br>
            <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
        </div>
    @endforeach
@endsection