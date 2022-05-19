<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    use HasFactory;

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->body_html)
            ->updated($this->updated_at)
            ->link(url('/blog/' . $this->url))
            ->authorName('Matthew Pennell')
            ->authorEmail('test@example.com');
    }

    public static function getFeedItems()
    {
        return Post::all();
    }
}
