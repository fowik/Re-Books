<?php
include "back-end/connect.php";

$book_id = $_POST['BooksID'];
$title = $_POST['Title'];
$rating = $_POST['Rating'];
$descirption = $_POST['Description'];
mysqli_query($conn, "UPDATE `books` SET `Title` = '$title', `Rating` = '$rating', `Description` = '$descirption' WHERE `books`.`BooksID` = '$book_id';");

header('Location: /Re-Books/admin.php');
?>