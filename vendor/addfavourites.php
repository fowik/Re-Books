<?php
    session_start();
    require_once 'connect.php';
    
    if ($_GET['bookID']) {
        $favourites_id = $_GET['bookID'];
        $user_id = $_SESSION['user']['userID'];
        
        $books_add = "INSERT INTO `favourites` (`FK_booksID`, `FK_userID`) VALUES ('$favourites_id', '$user_id');";
        mysqli_query($conn, $books_add) or die(mysqli_error($conn));

        header("Location: ../book-page.php?bookID=$favourites_id");
    }

?>