<?php

namespace app\core\database;

use PDO;

class QueryBuilder
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}
