<?php

session_start();

$connection = mysqli_connect("localhost", "root", "", "login_form");

$mail = $_GET['mail'];
$password = $_GET['password'];
$password = hash('sha512', $password);

$login_verify = mysqli_query($connection, "SELECT * FROM users WHERE mail = '$mail' and user_password = '$password'");

if (mysqli_num_rows($login_verify) > 0) {
    // Si las credenciales son válidas, obtenemos los datos del usuario
    $user_data = mysqli_fetch_assoc($login_verify);
    
    // Asignamos el nombre de usuario a la sesión
    $_SESSION['user'] = $user_data;
    
    // Redireccionamos a la página de inicio
    header("location: ../home.php");
    exit();
}    
else {
    // Si las credenciales son inválidas, mostramos un mensaje de error
    echo "
    <script>
        alert('Invalid Email or Password');
        window.location.href = '../index.html';
    </script>
    ";
}

mysqli_close($connection);
?>
