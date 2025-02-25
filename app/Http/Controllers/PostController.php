<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController
{
    //
    public function showIndexPosts($userId)
    {

        $posts = Post::all()->sortByDesc('published_at');
        $usuario = User::find($userId);
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


}
