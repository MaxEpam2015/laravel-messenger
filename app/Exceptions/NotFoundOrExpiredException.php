<?php

namespace App\Exceptions;

use Exception;

class NotFoundOrExpiredException extends Exception
{
    public function __construct(int $receiverNumber)
    {
        parent::__construct(__("Messages list from receiver number {$receiverNumber} not found or expired"));
    }
}
