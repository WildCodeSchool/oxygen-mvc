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
        $query = 'SELECT s.*, sr.testimonial 
                  FROM student s 
                  LEFT JOIN Student_Reviews sr ON s.id = sr.student_id';

        $statement = $this->pdo->query($query);
        $students = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $students;
    }
}
