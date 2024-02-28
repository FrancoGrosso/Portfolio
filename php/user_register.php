<?php

    session_start();

    $connection = mysqli_connect("localhost", "root", "", "login_form");

    $user_name = $_GET['user_name'];
    $mail = $_GET['mail'];
    $password = $_GET['password'];
    $password = hash('sha512', $password);

    $query = "INSERT INTO users(user_name, mail, user_password) 
    VALUES ('$user_name', '$mail', '$password')";

    $mail_verify = mysqli_query($connection, "SELECT * FROM users WHERE mail = '$mail'");
    $user_verify = mysqli_query($connection, "SELECT * FROM users WHERE user_name = '$user_name'");

    if (mysqli_num_rows($mail_verify) > 0) {
        echo "
        <script>
            alert('Mail already exists');
            window.location.href = '../index.html';
        </script>
        ";
        exit();
    }

    if (mysqli_num_rows($user_verify) > 0) {
        echo "
        <script>
            alert('An User Whit this Name already exists');
            window.location.href = '../index.html';
        </script>
        ";
        exit();
    }

    $execute = mysqli_query($connection, $query);

    if ($execute) {
        echo "<script>alert('Registered Successfully');</script>";
        echo "<script>window.location.href = '../index.html';</script>";
    } else {
        echo "<script>alert('Registration Failed');</script>";
    }

    mysqli_close($connection);
?>