<?php

namespace GoApptiv\SlackNotifier\Providers;

use GoApptiv\SlackNotifier\Events\Exception\UnidentifiedExceptionRaised;
use GoApptiv\SlackNotifier\Listeners\Exception\PublishUnidentifiedException;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UnidentifiedExceptionRaised::class => [
            PublishUnidentifiedException::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
