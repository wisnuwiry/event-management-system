<?php

namespace App\Helpers;

class ReadingTime
{
    public static function calculate($content)
    {
        $wordCount = str_word_count(strip_tags($content));
        $readingTime = ceil($wordCount / 250); // Assuming an average of 250 words per minute

        return $readingTime;
    }
}
