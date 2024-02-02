<?php

namespace App\Model;

class StudentManager extends AbstractManager
{
    public const TABLE = 'student';

    /**
     * Get all students from database
     */
    public function getAllStudents(): array
    {
        return $this->selectAll();
    }
    // Get all reviews of a student by their ID
    public function getStudentReviews($studentId): ?string
    {
        $query = 'SELECT testimonial FROM Student_Reviews WHERE student_id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $studentId, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchColumn();
    }

    // Get all students with their reviews
    public function getAllStudentWithReviews(): array
    {
        $students = $this->selectAll();
        forEach ($students as &$student) {
            $student['testimonial'] = $this->getStudentReviews($student['id']);
        }
        return $students;
    }


}
