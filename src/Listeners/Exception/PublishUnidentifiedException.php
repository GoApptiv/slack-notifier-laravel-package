<?php

namespace GoApptiv\SlackNotifier\Listeners\Exception;

use GoApptiv\SlackNotifier\BO\Exception\GenerateExceptionMessageBO;
use GoApptiv\SlackNotifier\Events\Exception\UnidentifiedExceptionRaised;
use GoApptiv\SlackNotifier\Services\SlackNotifier\SlackNotifierService;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublishUnidentifiedException implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @param SlackNotifierService $slackNotifierService
     *
     * @return void
     */
    public function __construct(
        SlackNotifierService $slackNotifierService
    ) {
        $this->slackNotifierService = $slackNotifierService;
    }

    /**
     * Handle the event.
     *
     * @param UnidentifiedExceptionRaised $event
     *
     * @return void
     */
    public function handle(UnidentifiedExceptionRaised $event)
    {
        $type = $event->type;
        $request = $event->request;
        $exception = $event->exception;

        $data = new GenerateExceptionMessageBO(
            $type,
            $request,
            $exception
        );

        $this->slackNotifierService->generateExceptionMessage($data);
    }
}
