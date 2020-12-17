<?php 

require 'php/connection.php';
require 'php/models/Reservas.php';
require 'php/models/Globales.php';
require 'php/models/Usuarios.php';

$globales = new Globales();

session_start();
$usuario = new Usuarios($_SESSION['id_user']);

var_dump($usuario->checkNochesGratis());

?>