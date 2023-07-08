<?php

namespace App\Services;

use App\Libraries\TagCounter;

class HtmlResultPresenterService
{
    public function displayResult(TagCounter $tagCounter): void
    {
        echo "<table border='1'>";
        echo "<tr><th>Tag</th><th>Count</th></tr>";
        foreach ($tagCounter->getTagCounts() as $tag => $count) {
            echo "<tr><td>$tag</td><td>$count</td></tr>";
        }
        echo "</table>";
    }
}

