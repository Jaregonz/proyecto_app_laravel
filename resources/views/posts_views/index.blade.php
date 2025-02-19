@vite('resources/css/posts_styles/index.css')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Lista de Posts</title>
</head>
<body>
    <h1>Lista de Publicaciones</h1>
    <h2>Bienvenido, {{ $usuario->name }}</h2>
    <ul>
        @foreach ($posts as $post)
            <li>
                <div class="card">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->description }}</p>
                    <p>Publicado el: {{ $post->publish_date }}</p>
                    <div class="post-meta">
                        <p>Likes: {{ $post->n_likes }}</p>
                        <p>Comentarios: {{ $post->comments->count() }}</p>
                    </div>
                    <div class="post-meta">
                        <form action="{{ route('posts.like', ['id' => $post->id, 'userId' => $usuario->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">Like</button>
                        </form>
                        
                        <?php if ($post->belongs_to == $usuario->id): ?>
                            
                            <form action="{{ route('posts.delete', ['id' => $post->id, 'userId' => $usuario->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar Post</button>
                            </form>

                        <?php endif; ?>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>