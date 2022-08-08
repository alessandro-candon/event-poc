<?php

namespace App\Events\CustomHandler\TinyElephant\PostPersist;

use App\Entity\TinyElephant;
use App\Events\Shared\AsyncEventInterface;

final class TinyElephantCreatedEvent implements AsyncEventInterface
{
    public function __construct(
        private readonly TinyElephant $tinyElephant
    )
    {
    }

    /**
     * @return TinyElephant
     */
    public function getTinyElephant(): TinyElephant
    {
        return $this->tinyElephant;
    }
}
