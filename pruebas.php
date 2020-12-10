<?php 

// $date = new DateTime('22/11/2020');
$date = DateTime::createFromFormat('d/m/Y', '22/11/2020');

// var_dump($date);
echo $date->format('Y-m-d');

?>