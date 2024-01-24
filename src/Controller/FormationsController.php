<?php

namespace App\Controller;

class FormationsController extends AbstractController
{
    /**
     * Display formation listing
     */
    public function index(): string
    {
        return $this->twig->render('Formations/index.html.twig');
    }
}
