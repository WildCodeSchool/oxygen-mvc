<?php

namespace App\Model;

use PDO;

class FormationManager extends AbstractManager
{
    public const TABLE = 'Course';
    public function __construct()
    {
        parent::__construct();
    }

    // Get all courses with discipline name
    public function selectAllByDiscipline(int $id): array
    {
        $query = 'SELECT c.*, d.name AS discipline_name
                  FROM ' . self::TABLE . ' c
                  JOIN discipline d ON c.discipline_id = d.id
                  WHERE c.discipline_id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->execute(['id' => $id]);

        return $statement = $statement->fetchAll();
    }
    public function selectOneByDisciplineId(int $id): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE discipline_id=:id");
        $statement->bindValue('id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
