<?php

namespace GoApptiv\SlackNotifier\DTO;

class RequestDTO
{
    private string $endpoint;
    private string $method;
    private string $body;

    /**
     * Constructor
     */
    public function __construct(string $endpoint, string $method, string $body)
    {
        $this->endpoint = $endpoint;
        $this->method = $method;
        $this->body = $body;
    }


    /**
     * Get the value of endpoint
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Set the value of endpoint
     *
     * @return  self
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Get the value of method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get the value of body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body
     *
     * @return  self
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
