<?php

namespace App\Services;

use App\Contracts\HtmlParserCounterInterface;
use App\Libraries\TagCounter;
use App\Services\HtmlContentFetcherService;
use App\Services\HtmlTagExtractorService;
use App\Services\HtmlTagCounterService;

class ParcerService implements HtmlParserCounterInterface
{
    public function __construct(
        private HtmlContentFetcherService $contentFetcher,
        private HtmlTagExtractorService $tagExtractor,
        private HtmlTagCounterService $tagCounterService,
        private string $url
    ) {
    }

    public function getContedTags(): TagCounter
    {
        $html = $this->contentFetcher->getHtmlContent($this->url);
        $tags = $this->tagExtractor->extractTags($html);
        $tagCounter = $this->tagCounterService->countTags($tags);
        return  $tagCounter;
    }
}
