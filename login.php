<?php
if(isset($_POST["email"])){
   include("conexiondb.php");
    $sql="SELECT * FROM usuarios WHERE email=:email";
    $stm=$conexion->prepare($sql);
    $stm->bindParam(":email", $_POST["email"]); 
    $stm->execute();
    $usuario=$stm->fetch();
    if($usuario){
        if(password_verify($_POST["password"], $usuario["password"])){
            session_start();
            $_SESSION["idusuario"] = $usuario["id"];
            $_SESSION["nombre"] = $usuario["nombre"];
            header("Location: nueva_foto.php");
            exit();
        }else{
            echo "Contraseña incorrecta";
            exit();
        } 
    }else{
        echo "Usuario no encontrado";
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
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required placeholder="Email">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required placeholder="Contraseña">
        <input type="submit" value="log">
    </form>
</body>
</html>