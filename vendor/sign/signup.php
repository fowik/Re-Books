<?php
    session_start();
    require_once "../connect.php";

    $email = $_POST['email'];
    $email_check = "SELECT `email` FROM `users` WHERE `email` = '$email'";
    $email_check = mysqli_query($conn, $email_check);
    $email_confirm = $_POST['email_confirm'];
    $username = $_POST['username'];
    $username_check = "SELECT `userID` FROM `users` WHERE `userID` = '$username'";
    $username_check = mysqli_query($conn, $username_check);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $admin = 0;

    //Input check
    if ($email == "" && $email_confirm == "" && $username == "" && $password == "" && $password_confirm == ""){
        $_SESSION['message'] = 'Jūs atstājāt tukšu lauku';
        header("Location: ../../register.php");
        exit();
    }

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    //User exist
    if (mysqli_num_rows($query) == 0) {
        $password = md5($password);

        mysqli_query($conn, "INSERT INTO `users` (`email`, `username`, `password`, `admin`) VALUES ('$email', '$username', '$password', '$admin');");
                                    
        $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        if (mysqli_num_rows($query) == 1) {
            $_SESSION['message'] = 'Veiksmīgi izveidots konts';
            $_SESSION["change"] = 
            'document.getElementById("registracija").style.display="none"; 
            document.getElementById("pieslegties").style.display="block";';
            header("Location: ../../register.php");
            exit();
        }
        else
            $_SESSION["message"] = 'Kļūme notika veidojot jūsu profilu.';
            header("Location: ../../register.php");
            exit();

        header("Location: ../../register.php");
    }
    else
        $_SESSION["message"] = 'Šis lietotājvārds / Epasts tiek jau izmantots. Izmantojiet citu.';
        header("Location: ../../register.php");
        exit();
?>