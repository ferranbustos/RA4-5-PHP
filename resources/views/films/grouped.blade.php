<h1>{{ $title }}</h1>

@if(empty($grouped))
    <font color="red">No se ha encontrado ninguna película</font>
@else
    @foreach($grouped as $genero => $anyos)
        <h2>Género: {{ $genero }}</h2>

        @foreach($anyos as $anyo => $films)
            <h3>Año: {{ $anyo }}</h3>

            <table border="1" cellpadding="5">
                <tr>
                    <th>name</th>
                    <th>year</th>
                    <th>genre</th>
                    <th>country</th>
                    <th>duration</th>
                    <th>img_url</th>
                </tr>

                @foreach($films as $film)
                    <tr>
                        <td>{{ $film['name'] }}</td>
                        <td>{{ $film['year'] }}</td>
                        <td>{{ $film['genre'] }}</td>
                        <td>{{ $film['country'] }}</td>
                        <td>{{ $film['duration'] }}</td>
                        <td>
                            <img src="{{ $film['img_url'] }}" style="width: 100px; height: 120px;" />
                        </td>
                    </tr>
                @endforeach
            </table>

            <br>
        @endforeach
        <hr>
    @endforeach
@endif

<a href="/">Volver</a>
