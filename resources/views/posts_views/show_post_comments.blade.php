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
    <h1>{{ $post->title }}</h1>
    <h2>{{ $post->description }}</h2>
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
    <button>
        <a>Comentar</a>
    </button>

</body>

</html>