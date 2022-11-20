<?php

namespace GoApptiv\SlackNotifier\DTO;

class ExceptionDTO
{
    private string $message;
    private string $stackTrace;

    /**
     * Constructor
     */
    public function __construct(string $message, string $stackTrace)
    {
        $this->message = $message;
        $this->stackTrace = $stackTrace;
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of stackTrace
     */
    public function getStackTrace()
    {
        return $this->stackTrace;
    }

    /**
     * Set the value of stackTrace
     *
     * @return  self
     */
    public function setStackTrace($stackTrace)
    {
        $this->stackTrace = $stackTrace;

        return $this;
    }
}
