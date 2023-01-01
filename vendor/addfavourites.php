<?php
    session_start();
    require_once 'connect.php';

    $favourites_id = $_GET['bookID'];

    if(!$_SESSION['user']) {
        $_SESSION['message'] = 'Jūms jāpierēģistrējas!';
        header("Location: ../book-page.php?bookID=$favourites_id");
    }

    if ($_GET['bookID']) {
        $user_id = $_SESSION['user']['userID'];
        $favourites = "SELECT `FK_booksID` FROM `favourites` WHERE `FK_booksID`= '$favourites_id'";
        $favourites = mysqli_query($conn, $favourites);

        if (mysqli_num_rows($favourites) > 0) {
            header("Location: ../book-page.php?bookID=$favourites_id");

        } else {
            $books_add = "INSERT INTO `favourites` (`FK_booksID`, `FK_userID`) VALUES ('$favourites_id', '$user_id');";
            mysqli_query($conn, $books_add) or die(mysqli_error($conn));

            header("Location: ../book-page.php?bookID=$favourites_id");

        }
    }
?>