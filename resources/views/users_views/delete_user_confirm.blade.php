<!DOCTYPE html>
@vite('resources/css/user_styles/logout.css')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/user_styles/logout.css') }}">
</head>
<body>
<form action="{{ route('user.delete') }}" method="POST" class="logout-form">
    @csrf
    <div class="logout-container">
        <h3>¿Seguro que quieres borrar tu usuario?</h3>
        <div class="logout-buttons">
            <button type="submit" class="btn btn-confirm">Sí, eliminar</button>
            <a href="{{ route('login') }}" class="btn btn-cancel">Cancelar</a>
        </div>
    </div>
</form>
</body>
</html>