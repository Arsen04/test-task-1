<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class OrderDTO
{
    public function __construct(
        public int $id,
        public ?int $userId,
        public array $items,
        public float $total,
        public string $createdAt,
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            id: (int) $data['id'],
            userId: isset($data['user_id']) ? (int) $data['user_id'] : null,
            items: $data['items'],
            total: isset($data['total']) ? (float) $data['total'] : 0.0,
            createdAt: date(format: 'Y-m-d H:i:s'),
        );
    }
}
