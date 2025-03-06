<!DOCTYPE html>
<html lang="en">
@vite('resources/css/posts_styles/index.css')
@php
    use App\Models\User;
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

    <h1>{{ $post->title }}</h1>
    <h2>{{ $post->description }}</h2>
    @if($post->foto)
        <img src="{{ asset('/storage/'.$post->foto) }}" alt="Imagen del post" class="post-image">
    @endif
    <p>Publicado el: {{ $post->publish_date }}</p>

    <h3>Comentarios:</h3>
    <ul>
        @foreach ($post->comments as $comment)
                <li>
                    <p>{{ $comment->comment }}</p>
                    <?php
            $usuario = User::find($comment->user_id); 
                        ?>
                    <p>Publicado por: {{ $usuario->name }} el {{ $comment->publish_date }}</p>
                </li>
        @endforeach
    </ul>
    <form action="{{ route("comment.add", ['userId'=> $userId, 'postId' => $post->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Escribe tu comentario:</label>
            <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Escribe tu comentario..."
                required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publicar Comentario</button>
        </div>
    </form>
</body>
</html>