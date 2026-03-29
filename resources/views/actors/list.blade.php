<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .count {
            margin: 20px 0;
            font-size: 18px;
            font-weight: bold;
            color: #666;
        }
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Birthdate</th>
            </tr>
        </thead>
        <tbody>
            @forelse($actors as $actor)
            <tr>
                <td>{{ $actor->id }}</td>
                <td>{{ $actor->name }}</td>
                <td>{{ $actor->surname }}</td>
                <td>{{ $actor->birthdate }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No actors found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <p class="count"><strong>Total actors:</strong> {{ count($actors) }}</p>
    
    <a href="{{ url('/') }}">Volver al inicio</a>
</body>
</html>