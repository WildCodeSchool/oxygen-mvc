<?php

namespace App\Model;

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

    //fonction pour supprimer une formation
    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
