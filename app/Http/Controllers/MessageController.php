<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Message\SendRequest;
use App\Jobs\SendMessage;
use Illuminate\Http\JsonResponse;
use App\Repository\Redis;

class MessageController extends Controller
{
    public function __construct(private readonly Redis $redis)
    {
    }

    public function send(SendRequest $sendRequest): JsonResponse
    {
        SendMessage::dispatch($sendRequest->receiver_number, $sendRequest->content);

        return new JsonResponse();
    }

    /**
     * @throws \Exception
     */
    public function get(int $receiverNumber): JsonResponse
    {
        return new JsonResponse($this->redis->showMessages($receiverNumber));
    }
}
