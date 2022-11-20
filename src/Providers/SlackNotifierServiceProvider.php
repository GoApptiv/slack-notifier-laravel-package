<?php

namespace GoApptiv\SlackNotifier\Providers;

use GoApptiv\SlackNotifier\Services\SlackNotifier\SlackNotifierService;
use Illuminate\Support\ServiceProvider;

class SlackNotifierServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton('goapptiv-slack-notifier', function ($app) {
            return new SlackNotifierService();
        });
    }
}
