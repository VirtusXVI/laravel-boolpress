@extends('layouts.dashboard')

@section('content')
    <h1>{{ $posts->title }}</h1>
    <div>Creato: {{ $posts->created_at }}</div>
    <div>Modificato: {{ $posts->updated_at }}</div>
    <p>{{ $posts->description }}</p>
@endsection