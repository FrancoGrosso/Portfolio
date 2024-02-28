<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "login_form");
$user_id = $_SESSION['user']['id'];
$query = "DELETE FROM users WHERE id = $user_id";
session_destroy();
// Ejecutar la consulta para eliminar la cuenta del usuario
if (mysqli_query($connection, $query)) {
    // Eliminación exitosa, redirigir al usuario a la página de inicio
    echo '<script>window.location = "../index.html"; </script>';
} else {
    // Error al eliminar la cuenta, mostrar un mensaje de error
    echo "Error al eliminar la cuenta.";
}

// Cerrar la conexión a la base de datos
mysqli_close($connection);
?>
