<?php

namespace App\Controller;

class FormationController extends AbstractController
{
   
     
    public function index(): string
    {
       
        return $this->twig->render('formation/index.html.twig');
    }
}