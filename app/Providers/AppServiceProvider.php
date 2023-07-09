<?php

namespace App\Providers;

use App\Contracts\HtmlParserCounterInterface;
use App\Services\HtmlContentFetcherService;
use App\Services\HtmlTagCounterService;
use App\Services\HtmlTagExtractorService;
use App\Services\ParcerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // In the world of code, sometimes less is more, but today, more is definitely more!
        // You asked about over engineering and abstain from KISS.. Here it is:
        $this->app->bind(HtmlParserCounterInterface::class, function ($app) {
            return new ParcerService(
                $app->make(HtmlContentFetcherService::class),
                $app->make(HtmlTagExtractorService::class),
                $app->make(HtmlTagCounterService::class),
                'https://www.php.net/'
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
