<?php

declare(strict_types=1);

namespace App\Exception;

use App\Http\Http;
use Exception;
use Throwable;

final class InvalidDataException extends Exception
{
    public function __construct(
        string $message = "",
        ?Http $code = Http::BAD_REQUEST,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code->value, $previous);
    }
}
