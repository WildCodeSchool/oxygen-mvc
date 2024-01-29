<?php

namespace App\Controller;

class FormationController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $name = 'Oxygen';
        return $this->twig->render('formation/index.html.twig', [
            'formation' => $name,
        ]);
    }
}
