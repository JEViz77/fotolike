<?php
include("conexiondb.php");
$sql="SELECT fotos.*, COUNT(likes.id) as num_likes FROM fotos LEFT JOIN likes ON fotos.id = likes.idfoto GROUP BY fotos.id;
";
?>