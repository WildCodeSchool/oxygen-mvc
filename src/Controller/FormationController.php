<?php

namespace App\Controller;
use App\Model\FormationManager;
use App\Model\StudentManager;
session_start();

class FormationController extends AbstractController
{
    public function show($id): string
{
    $coursesmananager = new FormationManager();
    $formations = $coursesmananager->selectOneById($id);

    $studentsmanager = new StudentManager();
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $student = array_map('trim', $_POST);
        $errors = $this->validateStudent($student);

        if (empty($errors)) {
            $studentsmanager->insert($student);
            $_SESSION['success'] = 'Votre inscription a été validée avec succès.';
            header('Location:formation?id=' .$id);
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

private function validateStudent($student)
{
    $errors = [];

    if (empty($student['name']) || !preg_match("/^[a-zA-Z-' ]*$/", $student['name'])) {
        $errors['nom'] = 'Le nom fourni nest pas valide.';
    }

    if (empty($student['prenom']) || !preg_match("/^[a-zA-Z-' ]*$/", $student['prenom'])) {
        $errors['prenom'] = 'Le prénom fourni nest pas valide.';
    }

    if (empty($student['email']) || !filter_var($student['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'adresse email fourni nest pas valide.';
    }

    if (empty($student['tel']) || !preg_match("/^[0-9]{10}$/", $student['tel'])) {
        $errors['tel'] = 'Le numero de telephone fourni nest pas valide.';
    }

    if (empty($student['niveau']) || !preg_match("/^[a-zA-Z-' ]*$/", $student['niveau'])) {
        $errors['niveau'] = 'Le niveau fourni nest pas valide.';
    }

    return $errors;
}
}