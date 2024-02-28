<?php

    session_start();

    if (!isset($_SESSION['user'])) {
       echo '
       <script>
        alert("Please login first");
        window.location = "index.html";
        </script>
       ';
        session_destroy();
        die();
    }

    $connection = mysqli_connect("localhost", "root", "", "login_form");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
   
    <h1>Welcome, 
        <?php
         echo $_SESSION['user']['user_name']; 
        ?>
    </h1>
    <h2>Your Email: <br>
        <?php  
            echo "<p'>{$_SESSION['user']['mail']}</p>";
            echo "<a href='php/logout.php'>Log Out</a>";
            echo '<a class="delete" href="php/delete_account.php" onclick="return confirm("¿Estás seguro de que quieres eliminar tu cuenta?")>Eliminar cuenta</a>';
        ?>
    </h2>  
</body>
</html>