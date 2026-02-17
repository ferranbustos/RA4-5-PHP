@extends('layouts.master')

@section('title', 'Count')

@section('content')

<h1 class="mb-4">{{ $title }}</h1>

<div class="alert alert-info">
    Total de películas: <b>{{ $total }}</b>
</div>

@endsection
