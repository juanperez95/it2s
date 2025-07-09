<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--Cargar favicon--}}
    <link rel="icon" href="{{ asset('assets/icono.png') }}" type="image/png">
    <title>IT2S</title>
    {{--Cargar los elementos de vite--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{--Cargar el componente principal de la pagina --}}
    <div id="app"></div>
</body>
</html>