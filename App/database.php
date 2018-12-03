<?php

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule();

$capsule->addconnection([
  'driver' => 'mysql',
  'host' => '127.0.0.1',
  'username' => 'root',
  'password' => '12345',
  'database' => 'biblioteca',
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix' => ''
]);

$capsule->bootEloquent();


 ?>
