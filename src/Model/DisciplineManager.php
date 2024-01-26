<?php

namespace App\Model;

use PDO;

class DisciplineManager extends AbstractManager
{
    public const TABLE = 'discipline';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}