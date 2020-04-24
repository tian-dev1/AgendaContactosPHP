<?php 
    /* Necesita la conexión a la BD*/
require('conexion.php');
//Validación de campos vacios
if ($_FILES['photoUpdate']['name'] != null && !empty($_POST['idContactUpdate']) && !empty($_POST['namesUpdate']) && !empty($_POST['lastNameUpdate']) && !empty($_POST['phoneUpdate']) && !empty($_POST['emailUpdate']) ) { //Validación que el input tipo file nop este vacio
    //Guardamos los datos obtenidos por POST en su respectiva variable
    $id = $_POST['idContactUpdate'];
    $names = $_POST['namesUpdate'];
    $lastName = $_POST['lastNameUpdate'];
    $phone = $_POST['phoneUpdate'];
    $email = $_POST['emailUpdate'];

    $carpeta = "files/";
    opendir($carpeta); #Abrimos la carpeta donde queremos guardar los archivos
    $destino = $carpeta .$_FILES['photoUpdate']['name']; #capturamos la img /file/imagen.png
    move_uploaded_file($_FILES['photoUpdate']['tmp_name'],$destino);
    //realizar la actualización de los datos a  nuestra tabla
    $sql = "UPDATE contacto SET names='$names' , lastName='$lastName', phone='$phone', email='$email', photo='$destino' WHERE id='$id'"; #sentencia SQL
    mysqli_query($conexion, $sql); #abrimos la conexión y ejecutamos la sentencia sql
    //Indicamos a qué archivo nos debe redirigir una vez hecho el registro
    header('Location: index.php');
}else{
    echo "Campos vacios por favor validar";
}
?>