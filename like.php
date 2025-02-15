<?php
session_start();
if (!isset($_SESSION["usuario_id"])){
    header("Location: index.html");
    exit();
}
if(isset($_GET["foto_id"])){
    include("conexiondb.php");
    $sql="INSERT INTO likes (foto_id, usuario_id) VALUES (:foto_id, :usuario_id)";
    $stm=$conexion->prepare($sql);
    $stm->bindParam(":foto_id", $_GET["foto_id"]);
    $stm->bindParam(":usuario_id", $_SESSION["usuario_id"]);
    $stm->execute();
    header("Location: main.php");
    exit();
}

?>