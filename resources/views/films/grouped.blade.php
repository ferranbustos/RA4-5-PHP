@extends('layouts.master')

@section('title', 'Grouped')

@section('content')

<h1 class="mb-4">{{ $title }}</h1>

@if(empty($grouped))
    <div class="alert alert-danger">No hay películas</div>
@else
    @foreach($grouped as $genero => $anyos)
        <div class="card mb-3">
            <div class="card-header bg-dark text-white">
                Género: {{ $genero }}
            </div>
            <div class="card-body">
                @foreach($anyos as $anyo => $films)
                    <h5>Año: {{ $anyo }}</h5>
                    <ul>
                        @foreach($films as $film)
                            <li>{{ $film['name'] }} ({{ $film['country'] }})</li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    @endforeach
@endif

@endsection
