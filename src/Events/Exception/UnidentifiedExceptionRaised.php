<?php

namespace GoApptiv\SlackNotifier\Events\Exception;

use GoApptiv\SlackNotifier\DTO\ExceptionDTO;
use GoApptiv\SlackNotifier\DTO\RequestDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UnidentifiedExceptionRaised
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public string $type;
    public RequestDTO $request;
    public ExceptionDTO $exception;

    /**
     * Create a new event instance.
     *
     * @param string $type
     * @param RequestDTO $request
     * @param ExceptionDTO $exception
     *
     * @return void
     */
    public function __construct(string $type, RequestDTO $request, ExceptionDTO $exception)
    {
        $this->type = $type;
        $this->request = $request;
        $this->exception = $exception;
    }
}
