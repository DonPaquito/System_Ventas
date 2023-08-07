<?php
// Inicia la sesión (asegúrate de haber hecho esto en otros archivos también)
session_start();

// Destruye todas las variables de sesión
session_destroy();

// Redirecciona al usuario a la página de inicio de sesión (o a cualquier otra página)
header("Location: login.php"); // Reemplaza "login.php" por la página que desees

// Asegúrate de que el código no siga ejecutándose después de la redirección
exit;
?>
