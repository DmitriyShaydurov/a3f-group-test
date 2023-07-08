<?php

namespace App\Http\Controllers;

use App\Contracts\HtmlParserCounterInterface;
use Illuminate\Routing\Controller;

class HtmlParserController extends Controller
{
    public function __construct(protected HtmlParserCounterInterface $parserService)
    {
    }

    public function parseAndDisplay()
    {
        try {
            $tagCounter =  $this->parserService->getContedTags();
            return view('results', ['tagCounts' => $tagCounter->getTagCounts(), 'error' => null]);
        } catch (\Exception $e) {
            return view('results', ['error' => 'Error: '  . $e->getMessage()]);
        }
    }
}
