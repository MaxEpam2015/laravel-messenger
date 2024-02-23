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

        return response()->json();
    }

    /**
     * @throws \Exception
     */
    public function get(int $receiverNumber): JsonResponse
    {
        return response()->json($this->redis->showMessages($receiverNumber));
    }
}
