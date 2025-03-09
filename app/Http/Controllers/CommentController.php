<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class CommentController
{
    public function addComment(Request $request, $userId, $postId) {
        $validator = Validator::make(
            $request->all(),
            [
                "comment"=>"required",
            ],[
                "comment.required" => "No puedes mandar el comentario vacío",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $datos = $request->all();
        $comment = new Comments();
        $comment->comment = $datos['comment'];
        $comment->publish_date = now();
        $comment->user_id = $userId;
        $comment->post_id = $postId;
        $comment->save();
        $post = Post::with('comments')->findOrFail($postId);
        return view('posts_views.show_post_comments', compact('post', 'userId'));
    
    }
    
    public function deleteComment($commentId) {
        $comment = Comments::findOrFail($commentId);
        $postId = $comment->post_id;
        $userId = $comment->user_id;
        $comment->delete();
        $post = Post::with('comments')->findOrFail($postId);
        return view('posts_views.show_post_comments', compact('post', 'userId'));
    }
}
