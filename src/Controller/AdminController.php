<?php

namespace App\Controller;

use App\Model\DisciplineManager;
use App\Model\StudentManager;
use App\Model\FormationManager;
use App\Model\ContactManager;


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

        // Get all applications
        $applications = $studentManager->getApplications();

        return $this->twig->render('Admin/home/dashboard.html.twig', [
            'title' => 'Dashboard',
            'disciplines' => $disciplines,
            'students' => $students,
            'totalStudent' => $totalStudent,
            'courses' => $courses,
            'totalCourses' => $totalCourses,
            'applications' => $applications,
        ]);
    }
    public function contact(): string
    {

        $ContactManager = new ContactManager();
        $contact = $ContactManager;
        $contact->selectAll();


        return $this->twig->render('admin/contact/contact.html.twig', [
            'contact' => $contact,
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

        // Initialize the formation manager
        $formationManager = new FormationManager();

        // Get all formations
        $courses = $formationManager->selectAll();

        // Total number of formations
        $totalCourses = count($courses);

        // Initialize the discipline manager
        $disciplineManager = new DisciplineManager();

        // Get all disciplines
        $disciplines = $disciplineManager->selectAll();

        // Initialize $filteredCourses to all courses initially
        $filteredCourses = $courses;

        // Check if a discipline filter is applied
        $disciplineId = isset($_GET['discipline_id']) ? intval($_GET['discipline_id']) : null;

        if ($disciplineId !== null) {
            $filteredCourses = $formationManager->selectAllByDiscipline($disciplineId);
        }

        // Total number of formations
        $totalCourses = count($filteredCourses);

        return $this->twig->render('Admin/formation/formation.html.twig', [
            'title' => 'Formation',
            'courses' => $filteredCourses,
            'totalCourses' => $totalCourses,
            'disciplines' => $disciplines,
            'disciplineId' => $disciplineId,
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
