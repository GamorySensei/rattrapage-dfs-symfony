<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TaskRepository $taskRepository): Response
    {
        // Récupération de TOUTES les tâches
        $tasks = $taskRepository->findAll();

        return $this->render('home/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }
}
