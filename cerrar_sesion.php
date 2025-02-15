<?php
// Iniciar la sesión (asegurarse de que la sesión esté iniciada)
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio o login
header("Location: index.html");
exit();
?>
