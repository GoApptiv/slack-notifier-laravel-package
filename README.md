# GoApptiv Slack Notifier Laravel Package
🚨 Utility to send notification to Slack channel 🚨

# Installation
Add the following code in the composer to install this package into your Laravel Project

Add the package name in the composer require

```json
"goapptiv/slack-notifier": "1.0.0"
```
```json
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/GoApptiv/slack-notifier-laravel-package.git"
    }
]
```

Add the following keys in your environment variables. Please contact the package manager for the following key values.

```env
EXCEPTION_LOG_SLACK_WEBHOOK_URL=
```

# Usage

## Push Exception Message to Slack Channel

The *PublishUnidentifiedException* listener listens to *UnidentifiedExceptionRaised* event to push message to slack channel.


```php
$requestData = new RequestDTO(
    $endpoint,
    $method,
    $body
);

$exceptionData = new ExceptionDTO(
    $exceptionMessage,
    $exceptionTrace
);

UnidentifiedExceptionRaised::dispatch($exceptionType,$requestDTO, $exceptionDTO);
```
