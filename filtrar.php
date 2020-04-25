<?php 
/* Necesita la conexión a la BD*/
require('conexion.php');
//Guardamos en variables los valores obtenidos por GET
$itemQuery = $_GET['itemQuery'];
$filter = $_GET['filter'];
//Sentencia sql a ejecutar
$sql = "SELECT * FROM contacto WHERE $itemQuery LIKE '%$filter%' ";
//Realizamos consulta la BD y lo guardamos en una variable 
$resultadoQuery =  mysqli_query($conexion, $sql);
//Obtenemos todas las filas de  el array asociativo resultadoQuery
$resultado_query = mysqli_fetch_all($resultadoQuery);

//Validamos que el resultado de la consulta traiga datos 
if(mysqli_num_rows($resultadoQuery)==0){
    $mensajeQuery = "<h3>Datos ingresados no concuerdan con ningún registro</h3>";
}else{
    $mensajeQuery = "<h3>Consulta específica</h3>";
}

?>
    <!-- Mensaje de vaidación -->   
    <?php echo $mensajeQuery ?>
    <div class="containerTwo">
    <!-- Realizamos el foreach de los datos filtrados de contactos -->      
    <?php foreach($resultado_query  as $registro): ?>
        <form>
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
    
