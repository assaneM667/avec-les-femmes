<?php

namespace App\Controller;

use App\Repository\GroupementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GroupementController extends AbstractController
{
    #[Route('/groupements', name: 'app_groupement_index', methods: ['GET'])]
    public function index(GroupementRepository $groupementRepository): Response
    {
        return $this->render('groupement/index.html.twig', [
            'groupements' => $groupementRepository->findBy([], ['nom' => 'ASC']),
        ]);
    }
}
