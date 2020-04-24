<?php
/* Necesita la conexión a la BD*/
require('conexion.php');


//Sentencia a ejecutar que será el delete 
$id = $_GET['idContact'];

$sql = "DELETE FROM contacto WHERE id = '$id'";

mysqli_query($conexion, $sql);

header('Location: index.php');

?>