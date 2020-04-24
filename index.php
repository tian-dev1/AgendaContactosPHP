<?php

require('conexion.php'); #Solicitamos la conexion a la BD
$sql = "SELECT * FROM contacto ORDER BY names ASC"; #guardamos en una variable la sentencia sql de la consulta

$resultado = mysqli_query($conexion, $sql); #resultado = $conexion->query($sql);

$resultado_contactos = mysqli_fetch_all($resultado); #Obtiene el resultado de la sentencia. ESto devuelve un array


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Agenda de contactos</title>
</head>
<body> 
    <h1>Agenda de contactos</h1>
    <div class="container">
        <h2>Ingresar contacto</h2>
        <form  class="formAgregar" method="POST" action="agregar.php" enctype="multipart/form-data">
            
            <input type="text" name="name" id="name" placeholder="Nombre:" required="required">

            <input type="text" name="lastName" id="lastName" placeholder="Apellidos:" required="required">

            <input type="email" name="email" id="email" placeholder="Email:" required="required">

            <input type="number" name="phone" id="phone" placeholder="Teléfono:" required="required">
            <div class="divFile">
                <input type="file" class="file" name="photo" required>
            </div>
            <input type="submit" value="Agregar contacto"/> 
        </form>
    </div>
     
    <h2>Lista y actualización de contactos</h2>
    <div class="containerTwo">
        <?php foreach($resultado_contactos as $registro): ?>
            <form method="POST" action="actualizar.php" enctype="multipart/form-data">
                <div class="card">
                    <img class="images" src="<?php echo $registro[5]; ?>" alt="">
                    <div class=row>
                        <label class="labelsContact" for="idContact">ID Imagen: </label>
                        <input type="number" readonly="readonly" name="photo" id="idContact" value="<?php echo $registro[0]; ?>"/>
                    </div>
                    <div class="row">
                        <label class="labelsContact" for="names">Nombre: </label>
                        <input type="text" name="names" id="names" value="<?php echo $registro[1]; ?>" required/>
                    </div>
                    <div class=row>
                        <label class="labelsContact" for="lastName">Apellidos: </label>
                        <input type="text" name="lastName" id="lastName" value="<?php echo $registro[2]; ?>"/>
                    </div>
                    <div class="row">
                        <label class="labelsContact" for="">Teléfono: </label>
                        <input type="number" name="phone" id="phone" value="<?php echo $registro[3]; ?>" required/>
                    </div>
                    <div class="row">
                        <label class="labelsContact" for="email">Correo: </label>
                        <input type="email" name="nameImg" id="email" value="<?php echo $registro[4]; ?>" required/>
                    </div>
                    <input class="file" type="file" name="img" required/>    
                    <input class="buttonUpdate" name="btnEnviar" type="submit" value="Actualizar contacto">
                </div>
            </form>
        <?php endforeach; ?>
    </div>
    <script>
        
    </script>
</body>
</html>
<?php 


?>