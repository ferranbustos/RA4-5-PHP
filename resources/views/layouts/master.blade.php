<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Films</a>

    <div class="navbar-nav">
        <a class="nav-link" href="/filmout/films">Listado</a>
        <a class="nav-link" href="/filmout/countFilms">Contar</a>
        <a class="nav-link" href="/filmout/sortFilms/asc">Orden ASC</a>
        <a class="nav-link" href="/filmout/sortFilms/desc">Orden DESC</a>
        <a class="nav-link" href="/filmout/groupFilms">Agrupar</a>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer class="bg-light text-center mt-5 p-3">
    <small>RA4-RA5 Laravel · Ferran</small>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
