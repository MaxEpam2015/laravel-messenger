<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exceptions\NotFoundOrExpiredException;
use Illuminate\Support\Facades\Redis as IlluminateRedis;

class Redis
{
    protected int $expirationTime = 7200; // 2 hours
    protected string $keyTemplate = 'receiverNumber:';
    protected int $startRange = 0;
    protected int $endRange = -1;

    public function sendMessage(int $key, string $value): void
    {
        IlluminateRedis::rpush($this->keyTemplate . $key, $value);
        IlluminateRedis::expire($this->keyTemplate . $key, $this->expirationTime);
    }

    /**
     * @throws \Exception
     */
    public function showMessages(int $key): array
    {
        $messagesList = IlluminateRedis::lrange($this->keyTemplate . $key, $this->startRange, $this->endRange);
        if (empty($messagesList)) {
            throw new NotFoundOrExpiredException($key);
        }

        return  $messagesList;
    }
}
