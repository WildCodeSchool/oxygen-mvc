<?php

namespace App\Controller;

use App\Model\FormationManager;
use App\Model\StudentManager;

class FormationController extends AbstractController
{
    public function show($id): string
    {
        $coursesmananager = new FormationManager();
        $formations = $coursesmananager->selectOneById($id);
        $success = null;
        //securisation de formulaire
        $studentsmanager = new StudentManager();
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student = array_map('trim', $_POST);

            // Validation des données du formulaire
          // Validation rules
            $rules = [
            'name' => [
                'pattern' => "/^[a-zA-Z-' ]*$/",
                'message' => 'Le nom fourni nest pas valide.',
            ],
            'prenom' => [
                'pattern' => "/^[a-zA-Z-' ]*$/",
                'message' => 'Le prénom fourni nest pas valide.',
            ],
            'email' => [
                'filter' => FILTER_VALIDATE_EMAIL,
                'message' => 'adresse email fourni nest pas valide.',
            ],
            'tel' => [
                'pattern' => "/^[0-9]{10}$/",
                'message' => 'Le numero de telephone fourni nest pas valide.',
            ],
            'niveau' => [
                'pattern' => "/^[a-zA-Z0-9-' ]*$/",
                'message' => 'Le niveau fourni nest pas valide.',
            ],
            ];

        // Validate each field
            foreach ($rules as $field => $rule) {
                if (
                     empty($student[$field]) ||
                     (isset($rule['pattern']) &&
                     !preg_match($rule['pattern'], $student[$field])) ||
                     (isset($rule['filter']) &&
                     !filter_var($student[$field], $rule['filter']))
                ) {
                    $errors[$field] = $rule['message'];
                }
            }


            if (empty($errors)) {
                $studentsmanager->insert($student);
                $_SESSION['success'] = 'Votre inscription a été validée avec succès.';
                header('Location:/formation?id=' . $id);
                exit();
            }
        }

        $success = $_SESSION['success'] ?? null;
        unset($_SESSION['success']);
        return $this->twig->render('formation/show.html.twig', [
            'formation' => $formations,
            'success' => $success,
            'errors' => $errors
        ]);
    }
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $formationManager = new FormationManager();
            $formationManager->delete((int) $id);
            header('Location:/admin/formation');
        }
    }
}
