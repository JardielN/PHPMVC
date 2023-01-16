<?php
namespace Framework\Database\Connection;

use Framework\Database\QueryBuilder\MysqlQueryBuilder;
use InvalidArgumentException;
use PDO;

class MysqlConnection extends Connection
{
    private PDO $pdo;

    public function __construct(array $config)
    {
        [
            'host' => $host,
            'port' => $port,
            'database' => $database,
            'username' => $username,
            'password' => $password,
        ] = $config;

        if(empty($host) || empty($database) || empty($username))
        {
            throw new InvalidArgumentException('Connection incorrectly configured');
        }

        $this->pdo = new PDO("mysql:host={$host};port={$port};dbname={$database};", $username, $password);
    }

    public function pdo(): PDO
    {
        return $this->pdo;
    }

    public function query(): MysqlQueryBuilder
    {
        return new MysqlQueryBuilder($this);
    }
}