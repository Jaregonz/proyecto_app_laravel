<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController
{
    public function showIndexPosts()
    {
        $posts = Post::all()->sortByDesc('published_at');
        $usuario = Auth::user();
        return view('posts_views.index', compact('posts', 'usuario'));
    }

    public function likePost($id, $idUser)
    {
        $post = Post::find($id);
        $post->n_likes = $post->n_likes + 1;
        $post->save();
        return redirect()->route('posts.index', ['userId' => $idUser]);
    }

    public function deletePost($id, $idUser)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index', ['userId' => $idUser]);
    }

    public function showPost($id, $userId)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('posts_views.show_post_comments', compact('post','userId'));
    }
    public function showCreatePost()
    {
        return view('posts_views.create_post_form');
    }
    public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string'
    ]);
    $path = $request->file('foto')->store('/app/public');

    $post = new Post();
    $post->title = $request->title;
    echo ($path);
    $post->description = $request->description;
    $post->foto = $path;
    $post->belongs_to = auth()->id();
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post creado exitosamente.');
}

}
