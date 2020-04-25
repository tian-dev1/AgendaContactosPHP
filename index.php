<?php

require('conexion.php'); #Solicitamos conexion a base de datos
$sql = "SELECT * FROM contacto ORDER BY names ASC"; #guardamos en una variable la sentencia sql de la consulta
$resultado = mysqli_query($conexion, $sql); #resultado = $conexion->query($sql);
$resultado_contactos = mysqli_fetch_all($resultado); #Obtiene el resultado de la sentencia. Esto devuelve un array

//Validamos que el resultado de la consulta traiga datos 
if(mysqli_num_rows($resultado)==0){
    $mensaje = "<h3>No hay registros en la BD</h3>";
}else{
    $mensaje = "<h3>Consulta general</h3>";
}
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
    <!-- Section de agregar contacto -->
    <div class="container">
        <h2>Ingresar contacto</h2>
        <form  class="formAgregar" method="POST" action="agregar.php" enctype="multipart/form-data">
            
            <input type="text" name="names" id="name" placeholder="Nombre:" required>

            <input type="text" name="lastName" id="lastName" placeholder="Apellidos:" required>

            <input type="email" name="email" id="email" placeholder="Email:" required>

            <input type="number" name="phone" id="phone" placeholder="Teléfono:" required>
            <div class="divFile">
                <input type="file" class="file" name="photo" required>
            </div>
            <input type="submit" value="Agregar contacto"/> 
        </form>
    </div>
     
    <h2>Lista y actualización de contactos</h2>
    <!-- Section de filtrar contacto -->
    <div class="container">
        <form class="formQuery" method="GET" enctype="multipart/form-data">
            <h3>Filtrar contactos</h3>
            <label for="" style="color: gray;">Filtrar por:</label>
            <select class="itemQuery" name="itemQuery">
                <option value="names" selected>Nombre</option> 
                <option value="lastName">Apellidos</option>
                <option value="phone">Teléfono</option>
            </select>
            <input type="text" name="filter" id="filter" placeholder="Dato a consultar:" required>
            <input type="submit" value="Buscar contacto"/>
        </form>
    </div>
    <div class="Query">
        <?php 
        #Validar si los datos de filtrar sean diferente en a null  
            if(!empty($_GET['filter']) && !empty($_GET['itemQuery'])){
                //Incluimos el archivo de filtrar
                include "filtrar.php"; 
            }
        ?>    
    </div>

    <?php echo $mensaje ?>
    <div class="containerTwo">
        <!-- Realizamos el foreach para listar los contactos -->
         <?php foreach($resultado_contactos as $registro): ?>
            <form method="POST" action="actualizar.php" enctype="multipart/form-data">
                <div class="card">
                    <img class="images" src="<?php echo $registro[5]; ?>" alt="">
                    <input type="hidden" readonly="readonly" name="idContactUpdate" id="idContactUpdate" value="<?php echo $registro[0]; ?>"/>
                    <div class="row">
                        <label class="labelsContact" for="namesUpdate">Nombre: </label>
                        <input type="text" name="namesUpdate" id="namesUpdate" value="<?php echo $registro[1]; ?>" required/>
                    </div>
                    <div class=row>
                        <label class="labelsContact" for="lastNameUpdate">Apellidos: </label>
                        <input type="text" name="lastNameUpdate" id="lastNameUpdate" value="<?php echo $registro[2]; ?>" required/>
                    </div>
                    <div class="row">
                        <label class="labelsContact" for="phoneUpdate">Teléfono: </label>
                        <input type="number" name="phoneUpdate" id="phoneUpdate" value="<?php echo $registro[3]; ?>" required/>
                    </div>
                    <div class="row">
                        <label class="labelsContact" for="emailUpdate">Correo: </label>
                        <input type="email" name="emailUpdate" id="emailUpdate" value="<?php echo $registro[4]; ?>" required/>
                    </div>
                    <div class="divFile">
                        <input class="file" type="file" name="photoUpdate" required/>    
                    </div>
                    <div class="buttonsActions">
                        <input class="buttonUpdate" name="btnEnviar" type="submit" value="Actualizar contacto">
                        <a id="Eliminar" href="eliminar.php?idContact=<?php echo $registro[0]; ?>">Eliminar contacto</a>
                    </div>
                </div>
            </form>
        <?php endforeach; ?> 
    </div>
</body>
</html>
<?php 


?>