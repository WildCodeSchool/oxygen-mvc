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

    /**
     * Get all applications with associated student and course information
     */
    public function getApplications(): array
    {
        $query = 'SELECT a.*, s.firstName, s.avatar_image, c.name AS course_name
                  FROM applications a
                  JOIN student s ON a.student_id = s.id
                  JOIN course c ON a.course_id = c.id';

        $statement = $this->pdo->query($query);
        $applications = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $applications;
    }

    /**
     * Get the 5 new_message with associated student
     */
        public function getNewMessages(): array
        {
            $query = 'SELECT n.*, s.firstName, s.lastName, s.avatar_image
                      FROM new_messages n
                      JOIN student s ON n.student_id = s.id
                      ORDER BY id DESC
                      LIMIT 5;';

            $statement = $this->pdo->query($query);
            $messages = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $messages;
        }
    }
