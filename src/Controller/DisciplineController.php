<?php

namespace App\Controller;

use App\Model\FormationManager;
use App\Model\DisciplineManager;

class DisciplineController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        // Initialize the discipline manager
        $disciplineManager = new DisciplineManager();

        // Get all disciplines
        $disciplines = $disciplineManager->selectAll();

        $coursesMananager = new FormationManager();
        $courses = $coursesMananager->selectAll();

        return $this->twig->render('discipline/index.html.twig', [
            'courses' => $courses,
            'disciplines' => $disciplines,
        ]);
    }
}
