<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\OrderDTO;
use App\Exception\InvalidDataException;
use App\Http\Http;
use App\Http\Request;
use App\Http\Response;
use App\Service\OrderService;
use App\Validator\OrderValidator;
use Exception;

final class OrderController
{
    public function __construct(
        private OrderValidator $orderValidator,
        private OrderService $orderService
    ) {
    }

    /**
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request): void
    {
        try {
            $requestContent = json_decode(json: $request->getBody()->getContents(), associative: true);
            $this->orderValidator->validateRequest(requestContent: $requestContent);
            $orderId = $this->orderService->processOrder(order: OrderDTO::fromRequest(data: $requestContent));

            Response::success(
                data: [
                    'id' => $orderId,
                    'message' => 'Your order has been placed'
                ],
                status: Http::CREATED
            );
        } catch(InvalidDataException $exception) {
            Response::error(
                message: $exception->getMessage()
            );
        } catch (Exception) {
            Response::error(
                message: "Can't proceed your order",
                status: Http::INTERNAL_SERVER_ERROR
            );
        }
    }
}
