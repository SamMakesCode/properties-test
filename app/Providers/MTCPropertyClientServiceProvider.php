<?php

namespace App\Providers;

use App\MTCPropertyClient;
use Illuminate\Support\ServiceProvider;

class MTCPropertyClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MTCPropertyClient::class, function ($app) {
            return new MTCPropertyClient([
                'base_uri' => 'https://trial.craig.mtcserver15.com/api/',
            ]);
        });
    }
}
