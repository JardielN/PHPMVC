<?php
namespace Framework\Database\QueryBuilder;

use Framework\Database\Connection\MysqlConnection;

class MysqlQueryBuilder extends QueryBuilder
{
    protected MysqlConnection $connection;

    public function __construct(MySqlConnection $connection)
    {
        $this->connection = $connection;
    }
}