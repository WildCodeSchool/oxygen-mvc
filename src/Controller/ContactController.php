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
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                return $this->twig->render('Contact/contact.html.twig');
            }
    
            foreach ($_POST as $key => $value) {
                $_POST[$key] = trim(htmlentities($value));
            }
    
            $errors = $this->validationForm();
    
            if (empty($errors)) {
                (new ContactManager())->insert($_POST);
                header('Location: /contact/message');
                exit();
            }
    
            return $this->twig->render('Contact/contact.html.twig', [
                'errors' => $errors,
                'post' => $_POST,
            ]);
        }
    
        private function validationForm(): array
        {
            $errors = [];
    
            $this->validateRequiredFields(['firstName', 'lastName', 'email', 'phone', 'message'], $errors);
            $this->validateStringLength('firstName', 2, 200, 'Veuillez ajouter un prénom valide d\'au moins 2 caractères !', $errors);
            $this->validateStringLength('lastName', 2, 200, 'Veuillez ajouter un nom valide d\'au moins 2 caractères !', $errors);
            $this->validateEmail('email', 'Veuillez ajouter une adresse mail valide !', $errors);
            $this->validateStringLength('phone', 10, 10, 'Veuillez ajouter un numéro de téléphone valide !', $errors);
            $this->validateStringLength('message', 10, 4000, 'Votre message doit contenir au moins 10 caractères', $errors);

            return $errors;
        }
    
        private function validateRequiredFields(array $fields, array &$errors): void
        {
            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    match ($field) {
                        'firstName' => $field = 'PRENOM',
                        'lastName' => $field = 'NOM',
                        'email' => $field = 'EMAIL',
                        'phone' => $field = 'NUMERO DE TELEPHONE',
                        'message' => $field = 'MESSAGE',
                        default => $field = 'champ',
                    
                    };
    
                    $errors[] = "Le champ {$field} est obligatoire";
                }
            }
        }
    
    
        private function validateStringLength(
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
        
    private function validateEmail(string $field, string $errorMessage, array &$errors): void
        {
            if (!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
                $errors[] = $errorMessage;
            }
        }
    

    public function message(): ?string
    {
        return $this->twig->render('Contact/contact.html.twig', [
            'success' => 'Merci ! nous avons bien reçu votre message, nous vous répondrons dans les plus brefs délais.',
        ]);
    }
}
