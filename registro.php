<?php
if(isset($_POST["nombre"])){ //si se envio un nombre por post entonces...
    include("conexiondb.php");
    $sql="INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
    $stm=$conexion->prepare($sql); 
    $stm->bindParam(":nombre", $_POST["nombre"]); 
    $stm->bindParam("email", $_POST["email"]);
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);// encriptar la contraseña
    $stm->bindParam("password", $hashed_password);  //vincular el parametro :password con el valor de la contraseña encriptada
    $stm->execute();
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
<form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required placeholder="Nombre">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required placeholder="Email">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required placeholder="Contraseña">
        <input type="submit" value="Registrarse">
        <p>Si ya tienes cuenta <a href="login.php">Login</a></p>
</form>

</body>
</html>