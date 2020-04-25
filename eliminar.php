<?php
/* Necesita la conexión a la BD*/
require('conexion.php');


//Guardamos en la variable $id lo recibido por el método GET
$id = $_GET['idContact'];
//Sentencia sql a ejecutar
$sql = "DELETE FROM contacto WHERE id = '$id'";
//Realizamos consulta la BD y lo guardamos en una variable 
mysqli_query($conexion, $sql);

// enviamos como encabezado index
header('Location: index.php');

?>