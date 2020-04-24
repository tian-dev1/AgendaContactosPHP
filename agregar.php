<?php 
/* Importamos el archivo de conexion*/
require('conexion.php');
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$carpeta = "files/";

opendir($carpeta); #Abrimos la carpeta donde queremos guardar los archivos
$destino = $carpeta .$_FILES['photo']['name']; #capturamos la img /file/imagen.png
move_uploaded_file($_FILES['photo']['tmp_name'],$destino);


//realizar la inserción de los datos a  nuestra tabla
$sql = "INSERT INTO contacto (names, lastName, phone, email, photo) VALUES ('$name', '$lastName', '$phone', '$email', '$destino' )"; #sentencia SQL

mysqli_query($conexion, $sql); #abrimos la conexión y ejecutamos la sentencia sql

//Indicamos a qué archivo nos debe redirigir una vez hecho el registro
header('Location: index.php');
?>