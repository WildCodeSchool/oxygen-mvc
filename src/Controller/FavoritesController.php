<?php

namespace App\Controller;

class FavoritesController extends AbstractController
{
    /**
     * Display formation listing
     */
    public function index(): string
    {
        return $this->twig->render('Favorites/index.html.twig');
    }
}