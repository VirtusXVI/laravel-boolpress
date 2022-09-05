@extends('layouts.dashboard')

@section('content')
    <h1>{{ $posts->title }}</h1>
    <p>{{ $posts->description }}</p>
@endsection