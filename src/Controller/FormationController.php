<?php

namespace App\Controller;

use App\Model\FormationManager;

class FormationController extends AbstractController
{
    public function show($id): string
    {
        //get the course whzere id course = id course in the url
        $CoursesManager = new FormationManager();
        $formations = $CoursesManager->selectOneById($id);

        return $this->twig->render('formation/show.html.twig', [
            'formation' => $formations
        ]);
    }
}
