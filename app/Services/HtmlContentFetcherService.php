<?php

namespace App\Services;

use Exception;

class HtmlContentFetcherService
{
    public function getHtmlContent(string $url): string
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($curl);
        curl_close($curl);
        if ($html === false) {
            throw new Exception('Failed to get HTML content');
        }
        return $html;
    }
}
