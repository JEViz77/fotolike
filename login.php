<?php
if(isset($_POST["email"])){ //si se envio un email por post entonces... 
   include("conexiondb.php");
    $sql="SELECT * FROM usuarios WHERE email=:email";
    $stm=$conexion->prepare($sql); //prepara la consulta
    $stm->bindParam(":email", $_POST["email"]); //vincula el parametro :email con el valor del email que se envio por post
    $stm->execute(); 
    $usuario=$stm->fetch(); //obtiene la fila de la consulta
    if($usuario){ //si se encontro un usuario con ese email entonces...
        if(password_verify($_POST["password"], $usuario["password"])){ //si la contraseña enviada por post coincide con la contraseña hasheada del usuario entonces...
            session_start(); //iniciar sesion
            $_SESSION["usuario_id"] = $usuario["usuario_id"]; //guardar la id del usuario en la sesion
            $_SESSION["nombre"] = $usuario["nombre"]; //guardar el nombre del usuario en la sesion
            header("Location: main.php");
            exit();
        }else{ //si la contraseña no coincide entonces...
            echo "Contraseña incorrecta";
            exit();
        } 
    }else{ //si no se encontro un usuario con ese email entonces...
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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required placeholder="Email">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required placeholder="Contraseña">
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>