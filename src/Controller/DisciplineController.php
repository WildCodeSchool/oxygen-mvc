<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $name = 'Oxygen';
        return $this->twig->render('discipline/index.html.twig', [
            'name' => $name,
        ]);
    }
}
