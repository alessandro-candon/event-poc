<?php

namespace App\Events\EntityHandler\TinyElephant;

use App\Entity\TinyElephant;
use App\Events\CustomHandler\TinyElephant\OnCreate\TinyElephantOnCreateMessage;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Messenger\MessageBusInterface;

class TinyElephantOnCreate
{
    public function __construct(
        protected MessageBusInterface $bus
    ) {
    }

    public function postPersist(TinyElephant $tinyElephant, LifecycleEventArgs $eventArgs): void
    {
        $this->bus->dispatch(new TinyElephantOnCreateMessage($tinyElephant));
    }
}
