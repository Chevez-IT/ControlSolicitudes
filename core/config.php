<?php
$db_host = "localhost"; // Host de la base de datos
$db_name = "controlsolicitudes_bd"; // Nombre de la base de datos
$db_user = "root"; // Nombre de usuario de la base de datos
$db_password = ""; // Contraseña del usuario de la base de datos

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,    // Modo de error de la conexion
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",    // CHARSET para la conexcion
    ]);
    
    
    // Configuración adicional de la conexión, si es necesario
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 8d2eda2fa0a3bd5940de3bed319fae9016aa74a8
