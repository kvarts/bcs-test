<?php

use yii\db\Connection;

return [
    'class' => Connection::class,
    'dsn' => 'mysql:host=db;dbname=bcs-test-app',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
