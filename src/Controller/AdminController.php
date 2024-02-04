<?php

namespace App\Controller;

class AdminController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Admin/home/dashboard.html.twig');
    }
    public function discipline(): string
    {
        return $this->twig->render('Admin/discipline/discipline.html.twig');
    }
    public function formation(): string
    {
        return $this->twig->render('Admin/formation/formation.html.twig');
    }
    public function student(): string
    {
        return $this->twig->render('Admin/student/student.html.twig');
    }
    public function message(): string
    {
        return $this->twig->render('Admin/message/message.html.twig');
    }
}