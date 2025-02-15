<?php
include("conexiondb.php"); 

$sql = "SELECT fotos.*, COUNT(likes.like_id) as num_likes 
        FROM fotos 
        LEFT JOIN likes ON fotos.foto_id = likes.foto_id 
        GROUP BY fotos.foto_id"; // Consulta para obtener todas las fotos y el numero de likes

$fotos = $conexion->query($sql)->fetchAll(PDO::FETCH_ASSOC); // Ejecuta la consulta y guarda los resultados en un array

// Verifica si la consulta devuelve resultados
if (!$fotos) {
    echo "No se han encontrado fotos o un error ocurrió en la consulta."; // Muestra un mensaje si no hay fotos
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotos</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <h1>Fotos</h1>
        <img src="fotos/User_icon_2.svg.png" alt="user-icon">
        <nav>
            <a href="nueva_foto.php">Subir Foto</a>
            <a href="cerrar_sesion.php">Cerrar Sesión</a>
            
        </nav>
    </header>
    
    <div class="container">
        <?php if ($fotos): ?> <!--Verifica si hay fotos disponibles-->
            <div class="foto-container">
                <?php foreach($fotos as $foto): ?> <!--Itera sobre cada foto-->
                    <div class="foto-item"> 
                        <img src="<?php echo $foto["foto"]; ?>" alt=""> <!--Muestra la foto-->
                        <h2><?php echo $foto["titulo"]; ?></h2> <!--Muestra el titulo de la foto-->
                        <p><?php echo $foto["num_likes"]; ?> Likes</p> <!--Mustra el numero de likes-->
                        <a href="like.php?foto_id=<?php echo $foto["foto_id"]; ?>">Like</a> <!--Agrega un like a la foto-->
                    </div>
                <?php endforeach; ?> <!--Fin del ciclo-->
            </div>
        <?php else: ?> <!--Si no hay fotos disponibles-->
            <p class="no-fotos">No hay fotos disponibles</p> <!--Muestra el mensaje no hay fotos disponibles-->
        <?php endif; ?> <!--Fin de la verificacion-->
    </div>
</body>

</html>
