<?php

namespace GoApptiv\SlackNotifier\Services\SlackNotifier;

use GoApptiv\SlackNotifier\BO\Exception\GenerateExceptionMessageBO;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class SlackNotifierService
{
    /**
     * Generate message
     *
     * @param GenerateExceptionMessageBO $data
     *
     */
    public function generateExceptionMessage(GenerateExceptionMessageBO $data)
    {
        Log::info("PREPARING EXCEPTION MESSAGE.");

        $request = $data->getRequest();
        $method = $request->getMethod();
        $endpoint = $request->getEndpoint();
        $body = $request->getBody();

        $exception = $data->getException();
        $errorMessage = $exception->getMessage();
        $stackTrace = $exception->getStackTrace();

        $blocks = new Collection();

        $header = collect([
            'type' => 'header',
            'text' => collect([
                'type' => 'plain_text',
                'text' => '🚨' . $data->getType() . '🚨',
                'emoji' => true,
            ])
        ]);
        $blocks->push($header);

        if (!empty($errorMessage)) {
            $message = collect([
                'type' => 'context',
                'elements' => [
                    collect([
                        'type' => 'mrkdwn',
                        'text' => '`' . $errorMessage . '`',
                    ])
                ]
            ]);
            $blocks->push($message);
        }

        $divider = collect([
            'type' => 'divider'
        ]);
        $blocks->push($divider);

        $requestSection = collect([
            'type' => 'section',
            'text' => collect([
                'type' => 'plain_text',
                'text' => 'REQUEST ',
                'emoji' => true,
            ]),
        ]);
        $blocks->push($requestSection);

        if (!empty($method)) {
            $requestMethodContext = collect([
                'type' => 'context',
                'elements' => [
                    collect([
                        'type' => 'mrkdwn',
                        'text' => 'Method : `' . $method . '`',
                    ]),
                ]
            ]);
            $blocks->push($requestMethodContext);
        }

        if (!empty($endpoint)) {
            $requestEndpointContext = collect([
                'type' => 'context',
                'elements' => [
                    collect([
                        'type' => 'mrkdwn',
                        'text' => 'Endpoint : `' . $endpoint . '`',
                    ]),
                ]
            ]);
            $blocks->push($requestEndpointContext);
        }

        if (!empty($body)) {
            $requestBodyContext = collect([
                'type' => 'context',
                'elements' => [
                    collect([
                        'type' => 'mrkdwn',
                        'text' => 'Body : ```' . $body . ' ```',
                    ])
                ]
            ]);
            $blocks->push($requestBodyContext);
        }

        $divider = collect([
            'type' => 'divider'
        ]);
        $blocks->push($divider);

        if (!empty($stackTrace)) {
            $stackTraceSection = collect([
                'type' => 'section',
                'text' => collect([
                    'type' => 'plain_text',
                    'text' => 'STACKTRACE :page_with_curl: ',
                    'emoji' => true,
                ])
            ]);
            $blocks->push($stackTraceSection);

            $stackTraceContext = collect([
                'type' => 'context',
                'elements' => [
                    collect([
                        'type' => 'plain_text',
                        'text' => $stackTrace,
                    ]),
                ]
            ]);
            $blocks->push($stackTraceContext);
        }

        $errorData = [
            'blocks' => $blocks
        ];

        $client = $this->getClient();

        Log::info("Publishing exception message...");
        $client->request("POST", env('EXCEPTION_LOG_SLACK_WEBHOOK_URL'), [
            'json' => $errorData
        ]);

        Log::info("EXCEPTION MESSAGE PUSHLISHED.");
    }

    /**
     * Build Client
     */
    private function getClient()
    {
        $client = new Client([
            'timeout' => 5, // Response timeout
            'connect_timeout' => 5, // Connection timeout
        ]);

        return $client;
    }
}
