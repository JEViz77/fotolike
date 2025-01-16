<?php
session_start();
if (!isset($_SESSION["idusuario"])){
    header("Location=index.php");
    exit();
}
if(isset($_GET["idfoto"])){
    try {
    include("conexiondb.php");
    $sql=
    }
}
?>