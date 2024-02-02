<?php

namespace App\Controller;

use App\Model\StudentManager;

class StudentController extends AbstractController
{
    /**
     * Display contact page
     */
    public function index(): ?string
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $contact = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $contactManager = new StudentManager();
            $contactManager->insert($contact);

            header('Location:/formulaire/congra');

            return null;
        }

            return $this->twig->render('formulaire/congra.html.twig');
    }
}
