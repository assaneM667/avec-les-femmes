<?php

namespace App\Controller;

use App\Enum\StatutExercice;
use App\Repository\ExerciceRepository;
use App\Repository\GroupementRepository;
use App\Repository\MembreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(
        ExerciceRepository $exerciceRepository,
        GroupementRepository $groupementRepository,
        MembreRepository $membreRepository,
    ): Response {
        return $this->render('home/index.html.twig', [
            'exerciceCount' => $exerciceRepository->count([]),
            'exerciceEnCoursCount' => $exerciceRepository->count([
                'statut' => StatutExercice::EN_COURS,
            ]),
            'groupementCount' => $groupementRepository->count([]),
            'membreCount' => $membreRepository->count([]),
        ]);
    }
}
