@extends('layouts.master')

@section('title', 'Listado')

@section('content')

<h1 class="mb-4">{{ $title }}</h1>

@if(empty($films))
    <div class="alert alert-danger">No se ha encontrado ninguna película</div>
@else
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>name</th>
                <th>year</th>
                <th>genre</th>
                <th>country</th>
                <th>duration</th>
                <th>img_url</th>
            </tr>
        </thead>
        <tbody>
        @foreach($films as $film)
            <tr>
                <td>{{ $film['name'] }}</td>
                <td>{{ $film['year'] }}</td>
                <td>{{ $film['genre'] }}</td>
                <td>{{ $film['country'] }}</td>
                <td>{{ $film['duration'] }}</td>
                <td><img src="{{ $film['img_url'] }}" style="width:100px"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

@endsection
