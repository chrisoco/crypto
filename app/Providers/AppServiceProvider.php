<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Http::macro('cmc', function () {
            return Http::withHeaders([
                'Accepts'           => 'application/json',
                'X-CMC_PRO_API_KEY' => config('app.api_cmc_key'),
            ])->baseUrl('https://pro-api.coinmarketcap.com/v1/cryptocurrency');
        });
    }
}
