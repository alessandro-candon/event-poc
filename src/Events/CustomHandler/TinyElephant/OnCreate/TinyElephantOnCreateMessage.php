<?php

namespace App\Events\CustomHandler\TinyElephant\OnCreate;

use App\Entity\TinyElephant;
use App\Events\Shared\AsyncMessageInterface;

final class TinyElephantOnCreateMessage implements AsyncMessageInterface
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
