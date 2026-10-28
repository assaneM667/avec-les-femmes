<?php

namespace App\Controller;

use App\Repository\ExerciceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ExerciceController extends AbstractController
{
    #[Route('/exercices', name: 'app_exercice_index', methods: ['GET'])]
    public function index(ExerciceRepository $exerciceRepository): Response
    {
        $exercices = $exerciceRepository->findBy(
            [],
            ['dateDebut' => 'DESC']
        );

        return $this->render('exercice/index.html.twig', [
            'exercices' => $exercices,
        ]);
    }
}