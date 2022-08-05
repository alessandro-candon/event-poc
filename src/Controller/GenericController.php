<?php

namespace App\Controller;

use App\Entity\TinyElephant;
use App\Events\CustomHandler\CheckProductAvailability\StockMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class GenericController extends AbstractController
{
    #[Route('/test/entity-async', methods: [Request::METHOD_GET])]
    public function index(EntityManagerInterface $entityManager)
    {
        $elephant = new TinyElephant();
        $elephant->setName('php');

        $entityManager->persist($elephant);
        $entityManager->flush();

        return $this->json([
            'ok'
        ]);
    }

    #[Route('/test/sync/{id}', methods: [Request::METHOD_GET])]
    public function sync(
        int $id,
        MessageBusInterface $messageBus
    )
    {
        $messageBus->dispatch(new StockMessage($id));
        return $this->json([
            'ok'
        ]);
    }
}
