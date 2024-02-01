<?php

namespace App\Controller;

use App\Model\DisciplineManager;
use App\Model\StudentManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $name = 'Oxygen';

        // Initialize the discipline manager
        $disciplineManager = new DisciplineManager();

        // Get all disciplines
        $disciplines = $disciplineManager->selectAll();

        // Initialize the student review manager
        $studentManager = new StudentManager();

        // Get all student reviews with associated student data
        $students = $studentManager->selectAllWithStudent();

        return $this->twig->render('Home/index.html.twig', [
            'name' => $name,
            'disciplines' => $disciplines,
            'students' => $students,
        ]);
    }
}
