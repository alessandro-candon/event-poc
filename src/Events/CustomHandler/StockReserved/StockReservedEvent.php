<?php

namespace App\Events\CustomHandler\StockReserved;

use App\Events\Shared\SyncEventInterface;

class StockReservedEvent implements SyncEventInterface
{
    public function __construct(
        public readonly int $id
    )
    {
    }
}
