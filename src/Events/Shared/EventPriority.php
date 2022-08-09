<?php

declare(strict_types=1);

namespace App\Events\Shared;

enum EventPriority: int
{
    case HIGH = 15;
    case MEDIUM = 10;
    case LOW = 5;
}
