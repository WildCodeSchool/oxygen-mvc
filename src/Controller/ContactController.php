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
        $errors=[];
        $form = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                foreach ($_POST as $key => $value) {
                $form[$key] = trim(htmlentities($value));
                }

            $errors = $this->validationForm();

                if (empty($errors)) {
                $contactManager = new ContactManager();
                $contactManager->insert($form);
                header('Location: /contact/message');
                exit();
                }
            }
        return $this->twig->render('Contact/contact.html.twig', [
        'errors' => $errors,
        'post' => $form,
        ]);
    }
    
// la méthode message() affiche un message de confirmation en cas de succes.
    public function message(): ?string
    {
        return $this->twig->render(
            'Contact/contact.html.twig',
            ['success' => 'Merci ! nous avons bien reçu votre message, nous vous répondrons dans les plus brefs délais.'
            ]
        );
    }
// la méthode validationForm() permet de valider les champs du formulaire.
    private function validationForm(): array
    {
        $errors = [];

        $this->validateRequired(['firstName', 'lastName', 'message'], $errors);
        $this->validateFieldLength('firstName', 3, 200, 'Veuillez ajouter un prénom valide 
        d\'au moins 3 caractères !', $errors);
        $this->validateFieldLength('lastName', 3, 200, 'Veuillez ajouter un nom valide 
        d\'au moins 3 caractères !', $errors);
        $this->validateMail('email', 'Veuillez ajouter une adresse mail valide !', $errors);
        $this->validatePhoneNumber('phone', 'Veuillez ajouter un numéro de téléphone valide !', $errors);
        $this->validateFieldLength('message', 10, 4000, 'Votre message doit contenir au moins 10 caractères', $errors);

        return $errors;
    }
// la méthode validateRequired() permet de valider les champs obligatoires.
    private function validateRequired(array $fields, array &$errors): void
    {
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                match ($field) {
                    'firstName' => $field = 'prénom',
                    'lastName' => $field = 'nom',
                    'message' => $field = 'message',
                    default => $field = 'champ',
                };

                    $errors[] = "Votre {$field} est obligatoire";
            }
        }
    }
// la méthode validateFieldLength() permet de valider la longueur des champs.

    private function validateFieldLength(
        string $field,
        int $minLength,
        int $maxLength,
        string $errorMessage,
        array &$errors
    ): void {
        $value = $_POST[$field] ?? '';
        $length = mb_strlen($value, 'UTF-8');

        if (!empty($value) && ($length < $minLength || $length > $maxLength)) {
            $errors[] = $errorMessage;
        }
    }
// la méthode validateMail() permet de valider l'adresse mail.
    private function validateMail(string $field, string $errorMessage, array &$errors): void
    {
        if (!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
            $errors[] = $errorMessage;
        }
    }
// la méthode validatePhoneNumber() permet de valider le numéro de téléphone.

    private function validatePhoneNumber(string $field, string $errorMessage, array &$errors): void
    {

        if (!preg_match('/^[0-9]{10,10}$/', $_POST[$field])) {
            $errors[] = $errorMessage;
        }
    }
}
