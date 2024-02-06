<?php

namespace App\Controller;

use App\Model\DisciplineManager;
use App\Model\StudentManager;
use App\Model\FormationManager;

class AdminController extends AbstractController
{
    public function index(): string
    {
        // Initialize the discipline manager
        $disciplineManager = new DisciplineManager();

        // Get all disciplines
        $disciplines = $disciplineManager->selectAll();

        // Initialize the student manager
        $studentManager = new StudentManager();

        // Get all students
        $students = $studentManager->getAllStudents();

        // Total number of students
        $totalStudent = count($students);

        // Initialize the formation manager
        $formationManager = new FormationManager();

        // Get all formations
        $courses = $formationManager->selectAll();

        // Total number of formations
        $totalCourses = count($courses);

        return $this->twig->render('Admin/home/dashboard.html.twig', [
            'title' => 'Dashboard',
            'disciplines' => $disciplines,
            'students' => $students,
            'totalStudent' => $totalStudent,
            'courses' => $courses,
            'totalCourses' => $totalCourses,
        ]);
    }
    public function discipline(): string
    {
        return $this->twig->render('Admin/discipline/discipline.html.twig', [
            'title' => 'Discipline',
        ]);
    }
    public function formation(): string
    {
        return $this->twig->render('Admin/formation/formation.html.twig', [
            'title' => 'Formation',
        ]);
    }
    public function student(): string
    {
        return $this->twig->render('Admin/student/student.html.twig', [
            'title' => 'Students',
        ]);
    }
    public function message(): string
    {
        return $this->twig->render('Admin/message/message.html.twig', [
            'title' => 'Message',
        ]);
    }
}
