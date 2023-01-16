<?php
namespace Framework\Database\Connection;

use Framework\Database\QueryBuilder\QueryBuilder;
use Pdo;


// Abstraer las conexiones a diferentes motores de bases de datos.
abstract class Connection
{
    /**
     * Get the underlying PDO instance for this connection
     */
    abstract public function pdo(): Pdo;

    /**
     * Start a new query on this connection
     */
    abstract public function query(): QueryBuilder;
}