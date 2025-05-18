<?php

declare(strict_types=1);

namespace App\Shared\Logging;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class Logger
{
    private MonologLogger $logger;

    public function __construct()
    {
        $this->logger = new MonologLogger(name: 'app');

        $this->logger->pushHandler(
            handler: new StreamHandler(
                stream: __DIR__ . '/app.log',
                level: MonologLogger::DEBUG
            )
        );
    }

    public function info(
        string $message,
        array $context = []
    ): void {
        $this->logger->info(message: $message, context: $context);
    }

    public function error(
        string $message,
        array $context = []
    ): void {
        $this->logger->error(message: $message, context: $context);
    }

    public function warning(
        string $message,
        array $context = []
    ): void {
        $this->logger->warning(message: $message, context: $context);
    }
}
