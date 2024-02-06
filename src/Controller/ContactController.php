<?php

namespace App\Controller;

use App\Model\ContactManager;

class ContactController extends AbstractController
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
            $contactManager = new ContactManager();
            $contactManager->insert($contact);

            header('Location:/contact');
            return null;
        }

            return $this->twig->render('Contact/contact.html.twig');
    }
}
