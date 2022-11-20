<?php

namespace GoApptiv\SlackNotifier\BO\Exception;

use GoApptiv\SlackNotifier\DTO\RequestDTO;

class GenerateExceptionMessageBO
{
    private string $type;
    private RequestDTO $request;
    private $exception;

    /**
     * Store Order
     */
    public function __construct(string $type, RequestDTO $request, $exception)
    {
        $this->type = $type;
        $this->request = $request;
        $this->exception = $exception;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the value of request
     *
     * @return  self
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get the value of exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * Set the value of exception
     *
     * @return  self
     */
    public function setException($exception)
    {
        $this->exception = $exception;

        return $this;
    }
}
