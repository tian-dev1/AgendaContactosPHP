<?php 
    /* Necesita la conexión a la BD*/
require('conexion.php');
if ($_FILES['photo']['name'] != null) { //Validación que el input tipo file nop este vacio
    $id = $_POST['idContact'];
    $names = $_POST['names'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $carpeta = "files/";
    opendir($carpeta); #Abrimos la carpeta donde queremos guardar los archivos
    $destino = $carpeta .$_FILES['photo']['name']; #capturamos la img /file/imagen.png
    move_uploaded_file($_FILES['photo']['tmp_name'],$destino);
    //realizar la actualización de los datos a  nuestra tabla
    $sql = "UPDATE contacto SET names='$names' , lastName='$lastName', phone='$phone', email='$email', photo='$destino' WHERE id='$id'"; #sentencia SQL
    mysqli_query($conexion, $sql); #abrimos la conexión y ejecutamos la sentencia sql
    //Indicamos a qué archivo nos debe redirigir una vez hecho el registro
    header('Location: index.php');
}else{
    echo "Campos vacios por favor validar";
}
?>