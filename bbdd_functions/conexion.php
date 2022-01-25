<?php

$cadena_conexion = 'mysql:dbname=php-sessions;host=127.0.0.1';
$usuario = 'root';
$contra = 'Usqpj=Z$';

try{
  $bd = new PDO($cadena_conexion, $usuario, $contra);
  $bd = null;
}
catch(PDOException $e) {
  echo "Error en la base de datos: ". $e->getMessage();
}
