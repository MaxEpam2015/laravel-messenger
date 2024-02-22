<?php

namespace App\Jobs;

use App\Repository\Redis;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly int $receiverNumber,
        private readonly string $content
    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Redis $redis)
    {
        $redis->sendMessage($this->receiverNumber, $this->content);
    }
}
