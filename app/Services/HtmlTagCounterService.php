<?php

namespace App\Services;

use App\Libraries\TagCounter;

class HtmlTagCounterService
{
    public function countTags(array $tags): TagCounter
    {
        $tagCounter = new TagCounter();
        foreach ($tags as $tag) {
            $tag = strtolower(trim($tag, '<>/'));
            $tagCounter->increment($tag);
        }
        return $tagCounter;
    }
}


