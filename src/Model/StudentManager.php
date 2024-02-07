<?php

namespace App\Model;

use PDO;

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
        $students = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $students;
    }
    public function insert(array $student): int
    {
        $query = "INSERT INTO " . self::TABLE .
            " (`firstName`, `lastName`, `email`, `tel`, `degree`, `formation`)
        VALUES (:firstName, :lastName, :email, :phone, :degree, :formation)";

        $statement = $this->pdo->prepare($query);

        $statement->bindValue(':firstName', $student['name'], PDO::PARAM_STR);
        $statement->bindValue(':lastName', $student['prenom'], PDO::PARAM_STR);
        $statement->bindValue(':email', $student['email'], PDO::PARAM_STR);
        $statement->bindValue(':phone', $student['tel'], PDO::PARAM_STR);
        $statement->bindValue(':degree', $student['niveau'], PDO::PARAM_STR);
        $statement->bindValue(':formation', $student['formation'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
