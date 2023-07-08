<?php

use App\Http\Controllers\HtmlParserController;
use App\Services\HtmlContentFetcherService;
use App\Services\HtmlTagCounterService;
use App\Services\HtmlTagExtractorService;
use App\Services\HtmlResultPresenterService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return view('welcome');
});

Route::get('/parser', [HtmlParserController::class, 'parseAndDisplay']);

// Route::get('/parser', function () {

//         $url = 'https://www.php.net/';
//         $contentFetcher = new HtmlContentFetcherService();
//         $tagExtractor = new HtmlTagExtractorService();
//         $tagCounterService = new HtmlTagCounterService();
//         $resultPresenter = new HtmlResultPresenterService();

//      $html = $contentFetcher->getHtmlContent($url);
//             $tags = $tagExtractor->extractTags($html);
//             $tagCounter = $tagCounterService->countTags($tags);
//             $resultPresenter->displayResult($tagCounter);
// });
