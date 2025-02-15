<?php
session_start();
if (!isset($_SESSION["usuario_id"])) { //si no hay una sesion iniciada entonces..
    header("Location: login.php");
}
if (isset($_POST["titulo"])) { //si se envio el titulo de la foto por post entonces...
    include("conexiondb.php");
    $nombreFoto = $_FILES["foto"]["name"]; //obtener el nombre de la foto
    $ruta = "./fotos/" . $nombreFoto; //definir ruta donde se guarda la foto
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta)) { //si se pudo mover la foto a la ruta entonces...
        $sql = "INSERT INTO fotos (titulo,foto,usuario_id) VALUES (:titulo,:foto,:usuario_id)"; //insertar en la tabla de fotos el titulo de la foto, la ruta de la foto y la id del usuario que subio la foto 
        $stm = $conexion->prepare($sql); //preparar la consulta 
        $stm->bindParam(":titulo", $_POST["titulo"]); //vincular el parametro :titulo con el valor del titulo de la foto que se envio por post 
        $stm->bindParam(":foto", $ruta); //vincular el parametro :foto con el valor de la ruta de la foto 
        $stm->bindParam(":usuario_id", $_SESSION["usuario_id"]); //vincular el parametro :usuario_id con el valor de la id del usuario que inicio sesion 
        $stm->execute(); //ejecutar consulta
       
        header("Location: main.php"); 
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nueva_foto.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre">Titulo</label>
        <input type="text" name="titulo" id="titulo" required placeholder="Titulo foto">
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" accept="image/*" required>
        <input type="submit" value="Subir foto">


    </form>
</body>

</html> 