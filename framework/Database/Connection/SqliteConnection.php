<?php
namespace Framework\Database\Connection;

use Framework\Database\QueryBuilder\SqliteQueryBuilder;
use InvalidArgumentException;
use PDO;

class SqliteConnection extends Connection
{
    private PDO $pdo;

    public function __construct(array $config)
    {
        ['path' => $path] = $config;

        if(empty($path))
        {
            throw new InvalidArgumentException('Connection incorrectly configured');
        }

        $this->pdo = new PDO("sqlite:{$path}");
    }

    public function pdo(): PDO
    {
        return $this->pdo;
    }

    public function query(): SqliteQueryBuilder
    {
        return new SqliteQueryBuilder($this);
    }
}