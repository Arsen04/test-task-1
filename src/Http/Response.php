<?php

declare(strict_types=1);

namespace App\Http;

final class Response
{
    public static function success(array $data = [], Http $status = Http::OK): void
    {
        http_response_code($status->value);
        echo json_encode([
            'status' => 'success',
            'data' => $data,
            'code' => $status->value,
            'message' => $status->label(),
        ]);
    }

    public static function error(string $message, Http $status = Http::BAD_REQUEST): void
    {
        http_response_code($status->value);
        echo json_encode([
            'status' => 'error',
            'message' => $message,
            'code' => $status->value,
            'error_label' => $status->label(),
        ]);
    }
}
