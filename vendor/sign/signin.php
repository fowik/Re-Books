<?php
    session_start();
    require_once '../connect.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        
        $_SESSION['user'] = [
            "userID" => $user['userID'],
            "username" => $user['username'],
            "avatar" => $user['avatar'],
            "email" => $user['email']
        ];

        header('Location: ../../user.php');
    } else {
        $_SESSION['message'] = 'Invalid login or password';
        header('Location: ../index.php');
    }
?>