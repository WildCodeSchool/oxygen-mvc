<?php

namespace App\Model;

use PDO;

class StudentManager extends AbstractManager
{
    public const TABLE = 'student';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(array $student): int
    {
        $query = "INSERT INTO " . self::TABLE .
            " (`firstName`, `lastName`, `email`, `tel`, `degree`, `birthday`, `address`, `avatar_image`) 
        VALUES (:firstName, :lastName, :email, :phone, :degree, :birthday, :address, :avatar_image)";

        $statement = $this->pdo->prepare($query);

        $statement->bindValue(':firstName', $student['firstName'], PDO::PARAM_STR);
        $statement->bindValue(':lastName', $student['lastName'], PDO::PARAM_STR);
        $statement->bindValue(':email', $student['email'], PDO::PARAM_STR);
        $statement->bindValue(':phone', $student['phone'], PDO::PARAM_STR);
        $statement->bindValue(':degree', $student['degree'], PDO::PARAM_STR);
        $statement->bindValue(':birthday', $student['birthday'], PDO::PARAM_STR);
        $statement->bindValue(':address', $student['address'], PDO::PARAM_STR);
        $statement->bindValue(':avatar_image', $student['avatar_image'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
