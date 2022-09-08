@extends('layouts.dashboard')

@section('content')
    <h1>{{ $posts->title }}</h1>
    <div>Creato: {{ $posts->created_at }}</div>
    <div>Modificato: {{ $posts->updated_at }}</div>
    <div>{{ $posts->category_id !== null ? 'Categoria: ' . $posts->category_id : ''}}</div>
    <p>{{ $posts->description }}</p>
@endsection