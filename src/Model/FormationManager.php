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

    // Insert new course
    public function insert(array $course): int
    {
        $statement = $this->pdo->prepare("
            INSERT INTO " . self::TABLE . " 
            (
                name, 
                description, 
                capacity, 
                location, 
                date, 
                duration, 
                degree, 
                financing_supported, 
                discipline_id, 
                url_image
            ) 
            VALUES 
            (
                :name, 
                :description, 
                :capacity, 
                :location, 
                :date, 
                :duration, 
                :degree, 
                :financing_supported, 
                :discipline_id, 
                :url_image
            )
        ");

        $statement->bindValue('name', $course['name'], \PDO::PARAM_STR);
        $statement->bindValue('description', $course['description'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('capacity', $course['capacity'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('location', $course['location'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('date', $course['date'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('duration', $course['duration'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('degree', $course['degree'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('financing_supported', isset($course['support']) ? true : false, \PDO::PARAM_BOOL);
        $statement->bindValue('discipline_id', $course['discipline_id'] ?? null, \PDO::PARAM_INT);
        $statement->bindValue('url_image', $course['url_image'] ?? null, \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    // Update course
    public function update(array $course): void
    {
        $statement = $this->pdo->prepare("
            UPDATE " . self::TABLE . " 
            SET 
                name = :name, 
                description = :description, 
                capacity = :capacity, 
                location = :location, 
                date = :date, 
                duration = :duration, 
                degree = :degree, 
                financing_supported = :financing_supported, 
                discipline_id = :discipline_id, 
                url_image = :url_image 
            WHERE 
                id = :id
        ");

        $statement->bindValue('id', $course['id'], \PDO::PARAM_INT);
        $statement->bindValue('name', $course['name'], \PDO::PARAM_STR);
        $statement->bindValue('description', $course['description'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('capacity', $course['capacity'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('location', $course['location'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('date', $course['date'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('duration', $course['duration'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('degree', $course['degree'] ?? null, \PDO::PARAM_STR);
        $statement->bindValue('financing_supported', isset($course['support']) ? true : false, \PDO::PARAM_BOOL);
        $statement->bindValue('discipline_id', $course['discipline_id'] ?? null, \PDO::PARAM_INT);
        $statement->bindValue('url_image', $course['url_image'] ?? null, \PDO::PARAM_STR);

        $statement->execute();
    }
}
