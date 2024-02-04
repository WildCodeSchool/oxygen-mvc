<?php

namespace App\Controller;

class AdminController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Admin/index.html.twig');
    }

    public function discipline(): string
    {
        return $this->twig->render('Admin/discipline.html.twig');
    }
}
