<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $data = $request->validate([
            'content' => 'required|string|min:2|max:2000',
            'name' => 'nullable|string|max:120',
            'email' => 'nullable|email|max:160',
        ]);

        $comment = new Comment();
        $comment->news_id = $news->id;
        $comment->content = $data['content'];

        if (Auth::check()) {
            $comment->user_id = Auth::id();
            $comment->name = Auth::user()->name ?? null;
            $comment->email = Auth::user()->email ?? null;
        } else {
            $comment->name = $data['name'] ?? 'Guest';
            $comment->email = $data['email'] ?? null;
        }

        $comment->save();

        // increment comments count on news table for quick access
        $news->increment('comments');

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'comment' => $comment], 201);
        }

        return back()->with('success', 'Comment posted.');
    }
}
