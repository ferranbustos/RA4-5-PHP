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
            color: #2c3e50;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 10px;
        }
        .count-box {
            background-color: white;
            padding: 40px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        .count-number {
            font-size: 72px;
            font-weight: bold;
            color: #4CAF50;
            margin: 20px 0;
        }
        .count-label {
            font-size: 24px;
            color: #666;
        }
        a {
            display: inline-block;
            margin: 20px 0;
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
    
    <div class="count-box">
        <div class="count-number">{{ $total }}</div>
        <div class="count-label">actores en la base de datos</div>
    </div>
    
    <a href="{{ url('/') }}">Volver al inicio</a>
</body>
</html>