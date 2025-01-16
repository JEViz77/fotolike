<?php
session_start();
if (!isset($_SESSION["idusuario"])) {
    header("Location: login.php");
}
if (isset($_POST["titulo"])) {
    include("conexiondb.php");
    $nombreFoto = $_FILES["foto"]["name"];
    $ruta = "./fotos/" . $nombreFoto;
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta)) {
        $sql = "INSERT INTO fotos (titulo,foto,idusuario) VALUES (:titulo,:foto,:idusuario)";
        $stm = $conexion->prepare($sql);
        $stm->bindParam(":titulo", $_POST["titulo"]);
        $stm->bindParam(":foto", $ruta);
        $stm->bindParam(":idusuario", $_SESSION["idusuario"]);
        $stm->execute();
       
        header("Location: index.php");
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