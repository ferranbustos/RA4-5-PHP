<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="container">

    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href=/filmout/films>Pelis</a></li>
    </ul>
    <h1>Añadir Pelicula</h1>
    <form action="{{ action('\app\Http\Controllers\FilmController@recibirinfo') }}"
     method="POST">
     {{ csrf_field() }}
    Nombre: <input type="text" name="nombre"><br>
    Año: <input type="number" name="año"><br>
    Genero: <input type="text" name="genero"><br>
    Pais: <input type="text" name="Pais"><br>
    Duracion: <input type="number" name="duracion"><br>
    Imagen URL: <input type="img" name="imagen"><br>
    <input type="submit">
    </form>

    
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</body>

</html>
