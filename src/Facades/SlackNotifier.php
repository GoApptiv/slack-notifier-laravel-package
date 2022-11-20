<?php

namespace GoApptiv\SlackNotifier\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @method static GoApptiv\SlackNotifier\Services\SlackNotifier\SlackNotifierService generateExceptionMessage(GenerateExceptionMessageBO $data)
 *
 */
class SlackNotifier extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'goapptiv-slack-notifier';
    }
}
