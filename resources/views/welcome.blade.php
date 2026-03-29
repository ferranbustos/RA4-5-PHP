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

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">Lista de Actores</div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('actors') }}">Ver todos los Actores</a>
            </li>
            <li class="list-group-item">
                <form action="{{ route('actorsByDecade') }}" method="GET" class="form-inline">
                    <label for="decade" class="mr-2">Buscar por década:</label>
                    <select name="decade" id="decade" class="form-control mr-2">
                        <option value="1980">1980-1989</option>
                        <option value="1990">1990-1999</option>
                        <option value="2000" selected>2000-2009</option>
                        <option value="2010">2010-2019</option>
                        <option value="2020">2020-2029</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                </form>
            </li>
        </ul>
    </div>
</div>

@endsection