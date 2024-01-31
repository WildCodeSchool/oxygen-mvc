<?php

namespace App\Controller;

use App\Model\DisciplineManager;

class DisciplineController extends AbstractController
{
    /**
     * Display home page
     */
    // public function __construct(private DisciplineManager $disciplineManager= new disciplineManager())
    // {
    //     parent::__construct();
    // }


    public function index(): string
    {
        $name = 'Oxygen';
        return $this->twig->render('discipline/index.html.twig', [
            'discipline' => $name,
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
