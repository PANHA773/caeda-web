<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::orderBy('published_at', 'desc')
            ->paginate(6);
        // eager load recent comments to avoid N+1 (use commentsList relationship)
        $news->load('commentsList');
        // mark is_liked from session for each item
        foreach ($news as $item) {
            $item->is_liked = session()->get('liked_news_' . $item->id, false);
        }

        return view('news', compact('news'));
    }

    public function toggleLike(Request $request, News $news)
    {
        $key = 'liked_news_' . $news->id;
        $liked = session()->get($key, false);

        if ($liked) {
            // unlike
            $news->decrement('likes');
            session()->put($key, false);
            $liked = false;
        } else {
            // like
            $news->increment('likes');
            session()->put($key, true);
            $liked = true;
        }

        // Return JSON for AJAX
        return response()->json(['likes' => $news->likes, 'is_liked' => $liked]);
    }
}
