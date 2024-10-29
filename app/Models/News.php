<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ReadingTime;

class News extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'thumbnail', 'published'];

    public function getReadingTime()
    {
        return ReadingTime::calculate($this->content);
    }
}
