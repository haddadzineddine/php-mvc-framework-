<?php

namespace app\core\database;

use PDO;



class Database
{
    protected PDO $pdo;

    public function __construct(protected array $config)
    {
        $host = $config['mysql']['host'];
        $database = $config['mysql']['database'];
        $username = $config['mysql']['username'];
        $password = $config['mysql']['password'];

        $dns = 'mysql:host=' . $host . ';dbname=' . $database;

        $this->pdo = new PDO(
            $dns,
            $username,
            $password
        );

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
