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

        $coursesMananager = new FormationManager();
        $courses = $coursesMananager->selectAll();

        return $this->twig->render('discipline/index.html.twig', [
            'courses' => $courses,
        ]);
    }
}
