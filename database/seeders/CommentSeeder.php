<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $newsItems = News::all();

        if ($newsItems->isEmpty()) {
            return;
        }

        foreach ($newsItems as $news) {
            // create a random number of comments per news (0-6)
            $count = rand(0, 6);
            Comment::factory()->count($count)->state(function () use ($news) {
                return ['news_id' => $news->id];
            })->create();

            // update the news comments counter to actual count
            $news->comments = $news->commentsList()->count();
            $news->save();
        }
    }
}
