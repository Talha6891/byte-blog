<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentReplyRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function create(StoreCommentRequest $request, string $id)
    {
        $validated = $request->validated();
        if (Auth::check())
        {
            $post = Post::findOrFail($id);
            Comment::create([
                'comment' => $validated['comment'],
                'post_id' => $post->id,
                'user_id' => Auth::id()
            ]);
            return back();
        }
        return redirect('login');
    }

    public function commentReply(StoreCommentReplyRequest $request, string $id)
    {
        $validated = $request->validated();
//        dd($validated);

        if (Auth::check())
        {
            $comment = Comment::findOrFail($id);
            CommentReply::create([
                'comment' => $validated['comment_reply'],
                'comment_id' => $comment->id,
                'user_id' => Auth::id()
            ]);
            return back();
        }
        return redirect('login');
    }
}
