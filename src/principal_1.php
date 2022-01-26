<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location:login.php?redirigido=true");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Página principal</title>
  <link rel="stylesheet" href="./scss/starter.scss">
  <link rel="stylesheet" href="../assets/css/starter.css">
  <link rel="stylesheet" href="../assets/css/starter.css.map">
</head>

<body>
  <?php echo "Bienvenido " . $_SESSION['usuario']; ?>
  <br><a href="logout.php">Salir</a>
</body>

</html>

<?php

$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$contra = 'Usqpj=Z$';

try {
  $bd = new PDO($cadena_conexion, $usuario, $contra);
  echo "<br>Conexión realizada con éxito<br>";

  $sql = "SELECT nombre, clave, rol FROM usuarios";
  $usuarios = $bd->query($sql);
  echo "Número de filas: ". $usuarios->rowCount() . "<br>";

  foreach ($usuarios as $row) {
    print $row['nombre'] . "\t";
    print $row['clave'] . "\t";
    print $row['rol'] . "\t<br>";
  }
} catch (PDOException $e) {
  echo "Error en la base de datos: " . $e->getMessage();
}
