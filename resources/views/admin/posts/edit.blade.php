@extends('layouts.dashboard')

@section('content')
    <h1>Modifica</h1>
    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $post->description }}">
        </div>

        <div class="mb-3">
            <label for="category_id">Categoria</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Nessuna</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        @foreach ($tags as $tag)
            <div class="form-check">
                <input class="form-check-input" 
                type="checkbox" 
                value="{{ $tag->id }}" 
                id="tag-{{ $tag->id }}" 
                name="tags[]"
                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                >
                <label class="form-check-label" for="tag-{{ $tag->id }}">
                    {{ $tag->name }}
                </label>
            </div>
        @endforeach

        <input type="submit" class="btn btn-primary" value="Salva">
    </form>
@endsection