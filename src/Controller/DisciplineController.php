<?php

namespace App\Controller;

use App\Model\DisciplineManager;

class DisciplineController extends AbstractController
{
    public function index(): string //html chaine de charactere
    {
        $disciplineManager = new DisciplineManager();
        $disciplines = $disciplineManager->selectAll();



        $name = 'discipline';
        return $this->twig->render('discipline/index.html.twig', [
            'discipline' => $name, 'disciplines' => $disciplines
        ]);
    }
    // public function show($id): string
    // {
    //     $discipline = $this->disciplineManager->selectOneById($id);
    //     return $this->twig->render('discipline/show.html.twig', [
    //         'discipline' => $discipline,
    //     ]);
    // }
}
