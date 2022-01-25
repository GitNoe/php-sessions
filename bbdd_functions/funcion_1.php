<!-- recuperación y presentación de datos -->

<?php

$cadena_conexion = 'mysql:dbname=php-sessions;host=127.0.0.1';
$usuario = 'root';
$contra = 'Usqpj=Z$';

try{
  $bd = new PDO($cadena_conexion, $usuario, $contra);
  echo "Conexión realizada con éxito";

  $sql = 'SELECT nombre, clave, rol FROM usuarios';
  $usuarios = $bd->query($sql);
  echo $usuarios->rowCount(). "<br>";

  foreach ($usuarios as $row) {
    print $row['nombre']. "\t";
    print $row['clave']. "\t";
  }
}
catch(PDOException $e) {
  echo "Error en la base de datos: ". $e->getMessage();
}

// también se pueden obtener instrucciones preparadas que permiten utilizar parámetros

$preparada = $bd->prepare("select nombre from usuarios where rol=?");
$preparada-> execute(array(0));
echo "Usuarios con rol 0: ". $preparada->rowCount(). "<br>";
foreach ($preparada as $usu){
  print "Nombre: ". $usu['nombre']. "<br>";
}

$preparada_nombre = $bd->prepare("select nombre from usuarios where rol=:rol");
$preparada_nombre-> execute(array(':rol=>0'));
echo "Usuarios con rol 0: ". $preparada->rowCount(). "<br>";
foreach ($preparada_nombre as $usu){
  print "Nombre: ". $usu['nombre']. "<br>";
}
