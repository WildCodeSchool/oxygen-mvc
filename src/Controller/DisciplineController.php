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
        $id = $_GET['id'];
        $coursesMananager = new FormationManager();
        $courses = $coursesMananager->SelectOneByDisciplineId ($id);

        return $this->twig->render('discipline/index.html.twig', [
            'courses' => $courses,
        ]);
    }
}
