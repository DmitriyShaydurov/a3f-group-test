<?php

namespace App\Contracts;

use App\Libraries\TagCounter;

interface HtmlParserCounterInterface
{
    public function getContedTags(): TagCounter;
}
