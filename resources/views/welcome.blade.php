@extends('layouts.master')

@section('title', 'Welcome')

@section('content')

<h1 class="mb-4">Lista de Películas</h1>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card">
    <div class="card-header">Añadir Película</div>
    <div class="card-body">
        <form action="{{ route('film') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Año</label>
                <input type="number" name="año" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Género</label>
                <input type="text" name="genero" class="form-control" required>
            </div>

            <div class="form-group">
                <label>País</label>
                <input type="text" name="Pais" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Duración</label>
                <input type="number" name="duracion" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Imagen URL</label>
                <input type="text" name="imagen" class="form-control" required>
            </div>

            <div class="card mt-4">
    <div class="card-header">Lista de Actores</div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('actors') }}">Ver todos los Actores</a>
            </li>
        </ul>
    </div>
</div>
@endsection
