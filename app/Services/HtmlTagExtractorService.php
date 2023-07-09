<?php

namespace App\Services;

class HtmlTagExtractorService
{
    /**
     * Extracts HTML tags from the given HTML string.
     *
     * @param string $html The HTML string to extract tags from.
     * @return array An array containing the extracted HTML tags.
     */
    public function extractTags(string $html): array
    {
        $pattern = '/<\/?(\w+)[^>]*>/';
        $tags = [];
        preg_match_all($pattern, $html, $matches);
        if (!empty($matches)) {
            $tags = $matches[1];
        }
        return $tags;
    }
}
