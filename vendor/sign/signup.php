<?php
    session_start();
    require_once "../connect.php";

    $email = $_POST['email'];
    $email_confirm = $_POST['email_confirm'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $admin = 0;

    if ($password === $password_confirm && $email === $email_confirm) {

        $password = md5($password);
        mysqli_query($conn, "INSERT INTO `users` (`email`, `username`, `password`, `admin`) VALUES ('$email', '$username', '$password', '$admin');");
        
        $_SESSION['message'] = 'Registration is succesfull!';
        header('Location: ../../register.php');

    
    } else {
        $_SESSION['message'] = 'Password or email are incorrect';
        header('Location: ../../register.php');
    }

?>