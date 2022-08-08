<?php

namespace App\Controller;

use App\Entity\TinyElephant;
use App\Events\CustomHandler\StockReserved\StockReservedEvent;
use App\Events\Shared\GlobalEventsCollector;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        GlobalEventsCollector $globalEventsCollector
    )
    {
        $globalEventsCollector->doCollect(new StockReservedEvent($id));
        return $this->json([
            'ok'
        ]);
    }
}
