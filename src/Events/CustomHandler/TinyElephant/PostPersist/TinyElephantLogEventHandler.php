<?php

namespace App\Events\CustomHandler\TinyElephant\PostPersist;

use App\Events\Shared\EventPriority;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler(handles: TinyElephantCreatedEvent::class, priority: EventPriority::MEDIUM)]
class TinyElephantLogEventHandler
{
    public function __construct(
        private readonly LoggerInterface $logger
    ){}

    public function __invoke(TinyElephantCreatedEvent $tinyElephantMessage): void
    {
        $this->logger->info('An elephant is created!');
    }
}
