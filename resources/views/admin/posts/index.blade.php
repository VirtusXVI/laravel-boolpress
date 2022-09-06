@extends('layouts.dashboard')

@section('content')
    @foreach ($posts as $post)
        <div>
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>
            <a href="{{ route('admin.posts.show', $post->id) }}">Scopri Di Più</a>
            <br>
            <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
            <br>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="Cancella">
            </form>
        </div>
    @endforeach
@endsection