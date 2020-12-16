<?php 

require 'php/connection.php';
require 'php/models/Reservas.php';
require 'php/models/Globales.php';

$globales = new Globales();

var_dump($globales->verDetalleReserva(6));


?>