<?php

use app\Models\User;

require __DIR__ . '/../vendor/autoload.php';

$user = (new User())->save([
    'name' => 'test',
    'email' => 'test@gmail.com',
    'password' => hash('md5', 'test@gmail.com'),
]);

print_r($user);