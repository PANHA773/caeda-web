<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::orderBy('published_at', 'desc')
            ->paginate(6);

        return view('news', compact('news'));
    }
}
