<?php
if(isset($_POST["titulo"])){
    
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
         <input type="file" name="foto" id="foto" accept="image/*" required >
         <input type="submit" value="Subir foto">


   </form> 
</body>
</html>