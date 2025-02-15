<?php
session_start(); //Iniciar sesion o reanudar la existente
if (!isset($_SESSION["usuario_id"])){ //Si no hay una sesion iniciada...
    header("Location: login.php"); //...redireccionar a index.html
    exit(); //Finalizar la ejecucion del script actual (opcional) 
}
if(isset($_GET["foto_id"])){ //Si se escribio una id de foto en la url (GET) entonces... 
    include("conexiondb.php"); 
    $sql="INSERT INTO likes (foto_id, usuario_id) VALUES (:foto_id, :usuario_id)"; //insertar en la tabla de likes la id de la foto y la id del usuario que dio like 
    $stm=$conexion->prepare($sql); //preparar la consulta
    $stm->bindParam(":foto_id", $_GET["foto_id"]); //vincular el parametro :foto_id con el valor de la id de la foto que se escribio en la url (GET) 
    $stm->bindParam(":usuario_id", $_SESSION["usuario_id"]); //vincular el parametro :usuario_id con el valor de la id del usuario que inicio sesion 
    $stm->execute(); //ejecutar la consulta
    header("Location: main.php"); //redireccionar a main.php
    exit(); //Finalizar la ejecucion del script actual (opcional)
}

?>