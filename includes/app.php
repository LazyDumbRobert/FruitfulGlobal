<?php 
use Model\ActiveRecord;
require __DIR__ . '/../vendor/autoload.php';
require 'funciones.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
require 'config/database.php';


//Conectar a la base de datos
$db = conectarDB();
ActiveRecord::setDB($db);

?>