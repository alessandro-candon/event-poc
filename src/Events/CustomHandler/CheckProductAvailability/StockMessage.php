<?php

namespace App\Events\CustomHandler\CheckProductAvailability;

class StockMessage
{
    public function __construct(
        public readonly int $id
    )
    {
    }
}
