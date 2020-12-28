<?php 

require 'php/connection.php';
require 'php/models/Reservas.php';
require 'php/models/Globales.php';
require 'php/models/Usuarios.php';

$globales = new Globales();

echo $_SERVER['DOCUMENT_ROOT'];

?>