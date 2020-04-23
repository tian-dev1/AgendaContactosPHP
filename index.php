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
        <h2 style="text-align: center;">Ingresar contacto</h2>
        <form id="formAgregar" class="formAgregar" method="POST" action="agregarContacto.php" enctype="multipart/form-data">
            
            <input type="text" name="name" id="name" placeholder="Nombre:" required="required">

            <input type="text" name="lastName" id="lastName" placeholder="Apellidos:" required="required">

            <input type="email" name="email" id="email" placeholder="Email:" required="required">

            <input type="number" name="phone" id="phone" placeholder="Teléfono:" required="required">
            <div class="divFile">
                <input type="file" class="file" required>
            </div>
            <input type="submit" value="Agregar contacto"/> 
        </form>
    </div>
     
    <h2>Lista y actualización de contactos</h2>
    <div class="container">

    </div>
    <script>
        
    </script>
</body>
</html>
<?php 


?>