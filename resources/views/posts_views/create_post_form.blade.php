<!DOCTYPE html>
@vite('resources/css/user_styles/forms.css')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<header>
<nav class="navbar">
        <div class="navbar-brand">
            <a href="">PostCity</a>
        </div>

        <div class="navbar-links">
            <a href="{{ route('post.showCreatePostForm') }}">Añadir Post</a>
            <a href="{{ route('user.deleteConfirm') }}">Eliminar cuenta</a>
            <a href="{{ route('user.logoutConfirm') }}">Cerrar Sesión</a>
        </div>
    </nav>
</header>
<main class="main__register">
    <form class="register__register_form {{ $errors->any() ? 'register__register_form-error' : '' }}" action="{{ route('post.storePost') }}" method="post">
        <h2 class="cabecera">Nuevo post</h2>
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input class="form-control" type="text" name="titulo" placeholder="Introduce el titulo">
            @error('titulo') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <input class="form-control" type="textarea" name="descripcion" placeholder="Introduce la descripcion">
            @error('descripcion') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
        <label for="foto">Foto</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*" required>
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary">Subir</button>
            <button type="reset" class="btn btn-danger">Reiniciar</button>
        </div>
    </form>
</main>    
</body>
</html>