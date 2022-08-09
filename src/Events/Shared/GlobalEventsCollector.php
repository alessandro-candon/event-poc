<?php

declare(strict_types=1);

namespace App\Events\Shared;

use App\Entity\Common\EventsCollectableInterface;
use App\Shared\Domain\Event\DomainEvent;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\Messenger\MessageBusInterface;

use function spl_object_hash;

class GlobalEventsCollector
{
    /**
     * @var EventInterface[]
     */
    private array $events = [];

    public function __construct(
        private readonly MessageBusInterface $bus
    )
    {
    }

    public function doCollect(EventInterface $event): void
    {
        $this->events[spl_object_hash($event)] = $event;
    }

    /**
     * Returns all collected events then clear.
     */
    public function dispatchCollectedEvents(): void
    {
        foreach ($this->events as $event) {
            $this->bus->dispatch($event);
        }
    }
}
