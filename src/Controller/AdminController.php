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

        // Get all applications
        $applications = $studentManager->getApplications();

        // Get all messages
        $messages = $studentManager->getNewMessages();

        return $this->twig->render('Admin/home/dashboard.html.twig', [
            'title' => 'Dashboard',
            'disciplines' => $disciplines,
            'students' => $students,
            'totalStudent' => $totalStudent,
            'courses' => $courses,
            'totalCourses' => $totalCourses,
            'applications' => $applications,
            'messages' => $messages,
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

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Clean $_POST data
            $courseData = [
                'id' => isset($_POST['course-id']) ? intval($_POST['course-id']) : null,
                'name' => $_POST['name-course'],
                'description' => $_POST['courseDes'],
                'capacity' => $_POST['capacity'],
                'location' => $_POST['location'],
                'date' => $_POST['date-course'],
                'duration' => $_POST['duration'],
                'degree' => $_POST['degree'],
                'financing_supported' => isset($_POST['support']) ? true : false,
                'discipline_id' => isset($_POST['discipline']) ? intval($_POST['discipline']) : null,
                'url_image' => $_POST['image-url'],
            ];

             // Check if it's an edit operation
            if (isset($_POST['course-id'])) {
                // Edit existing course
                $formationManager->update($courseData);
            } else {
                // Insert new course data into the database
                $formationManager->insert($courseData);
            }

            // Redirect to prevent form resubmission
            header('Location: /admin/formation');
            exit;
        }

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
