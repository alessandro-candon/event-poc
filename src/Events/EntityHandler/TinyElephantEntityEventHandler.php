<?php

namespace App\Events\EntityHandler;

use App\Entity\TinyElephant;
use App\Events\CustomHandler\TinyElephant\PostPersist\TinyElephantCreatedEvent;
use App\Events\Shared\GlobalEventsCollector;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class TinyElephantEntityEventHandler
{
    public function __construct(
        private readonly GlobalEventsCollector $globalEventsCollector
    ) {
    }

    public function postPersist(TinyElephant $tinyElephant, LifecycleEventArgs $eventArgs): void
    {
        $this->globalEventsCollector->doCollect(new TinyElephantCreatedEvent($tinyElephant));
    }
}
