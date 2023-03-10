<?php

namespace App\Http\Controllers;

use Framework\Database\Factory;
use Framework\Database\Connection\MysqlConnection;

class ShowHomePageController
{
    public function handle()
    {
        $factory = new Factory();
        $factory->addConnector('mysql', function($config)
        {
            return new MysqlConnection($config);
        });

        $connection = $factory->connect([
            'type' => 'mysql',
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => 'prophpmvc',
            'username' => 'root',
            'password' => '',
        ]);

        $product = $connection
        ->query()
        ->select()
        ->from('products')
        ->first();

        return view('home', [
            'number' => 42,
            'featured' => $product]);
    }
}
