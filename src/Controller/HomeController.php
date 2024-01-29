<?php

namespace App\Controller;

use App\Model\DisciplineManager;

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

        return $this->twig->render('Home/index.html.twig', [
            'name' => $name,
            'disciplines' => $disciplines,
        ]);
    }
}
