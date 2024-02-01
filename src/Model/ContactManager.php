<?php

namespace App\Model;

use PDO;

class ContactManager extends AbstractManager
{
    public const TABLE = 'contact';

    /**
     * Insert new item in database
     */
    
    public function insert(array $contact): int
    {
        $query = "INSERT INTO " . self::TABLE .
            " (`firstName`, `lastName`, `email`, `phone`, `message`)
        VALUES (:firstName, :lastName, :email, :phone, :message)";

        $statement = $this->pdo->prepare($query);

        $statement->bindValue(':firstName', $contact['firstName'], PDO::PARAM_STR);
        $statement->bindValue(':lastName', $contact['lastName'], PDO::PARAM_STR);
        $statement->bindValue(':email', $contact['email'], PDO::PARAM_STR);
        $statement->bindValue(':phone', $contact['phone'], PDO::PARAM_STR);
        $statement->bindValue(':message', $contact['message'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}

    
