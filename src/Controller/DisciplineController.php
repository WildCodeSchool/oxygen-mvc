<?php

namespace App\Controller;

use App\Model\FormationManager;

class DisciplineController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {

        $CoursesManager = new FormationManager();
        $courses = $CoursesManager->selectAll();

        return $this->twig->render('discipline/index.html.twig', [
            'courses' => $courses,
        ]);
    }
}
