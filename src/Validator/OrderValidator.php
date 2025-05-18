<?php

declare(strict_types=1);

namespace App\Validator;

use App\Exception\InvalidDataException;
use App\Shared\Logging\Logger;

final class OrderValidator
{
    public function __construct(
        private Logger $logger
    ) {}

    /**
     * @param array $requestContent
     * @return bool
     * @throws InvalidDataException
     */
    public function validateRequest(array $requestContent): true
    {
        if (empty($requestContent)) {
            $this->logger->warning(message: 'Validation failed: request is empty', context: $requestContent);

            throw new InvalidDataException(
                message: 'Request cannot be empty.',
            );
        }

        if (!isset($requestContent['items']) || !$this->hasValidItems($requestContent['items'])) {
            $this->logger->warning(
                message: 'Validation failed: items are not valid',
                context: $requestContent['items']
            );

            throw new InvalidDataException(
                message: 'Invalid or missing "items".',
            );
        }

        return true;
    }

    private function hasValidItems(mixed $items): bool
    {
        if (!is_array($items) || empty($items)) {
            return false;
        }

        foreach ($items as $item) {
            if (
                isset($item['product'], $item['price']) &&
                is_string($item['product']) &&
                trim($item['product']) !== '' &&
                is_numeric($item['price']) &&
                $item['price'] > 0
            ) {
                return true;
            }
        }

        return false;
    }
}
