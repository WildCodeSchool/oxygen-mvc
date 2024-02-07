<?php

namespace App\Controller;

use App\Model\FormationManager;

class FormationController extends AbstractController
{
    public function show($id): string
    {
        //get the course whzere id course = id course in the url
        $coursesMananager = new FormationManager();
        $formations = $coursesMananager->selectOneById($id);

        return $this->twig->render('formation/show.html.twig', [
            'formation' => $formations
        ]);
    }
    //fonction pour supprimer une formation
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
