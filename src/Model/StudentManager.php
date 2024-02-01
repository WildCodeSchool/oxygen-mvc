<?php

namespace App\Model;

class StudentManager extends AbstractManager
{
    public const TABLE = 'Student_Reviews';

    /**
     * Get all student reviews with associated student data
     */
    public function selectAllWithStudent(): array
    {
        $query = 'SELECT sr.*, s.*
        FROM ' . self::TABLE . ' sr
        JOIN student s ON sr.student_id = s.id';

        return $this->pdo->query($query)->fetchAll();
    }

}