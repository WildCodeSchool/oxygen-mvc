<?php

namespace App\Controller;

class ContactController extends AbstractController
{
    /**
     * Display contact page
     */
    public function index(): string
    {
        $name = 'Oxygen';
        return $this->twig->render('Contact/contact.html.twig', [
            'name' => $name,
        ]);
    }
}
