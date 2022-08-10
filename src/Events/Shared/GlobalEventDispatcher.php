<?php

declare(strict_types=1);

namespace App\Events\Shared;

use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class GlobalEventDispatcher implements EventSubscriberInterface
{
    public function __construct(
        private readonly GlobalEventsCollector $domainEventsCollector,
    ) {
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        $this->domainEventsCollector->dispatchCollectedEvents();
    }

    public function onConsoleTerminate(): void
    {
        $this->domainEventsCollector->dispatchCollectedEvents();
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
            ConsoleEvents::TERMINATE => 'onConsoleTerminate',
        ];
    }
}
