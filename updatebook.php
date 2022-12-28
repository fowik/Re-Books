<?php
include "back-end/connect.php";

$book_id = $_POST['Book_ID'];
$title = $_POST['Title'];
$rating = $_POST['Rating'];
$descirption = $_POST['Description'];
mysqli_query($conn, "UPDATE `book` SET `Title` = '$title', `Rating` = '$rating', `Description` = '$descirption' WHERE `book`.`Book_ID` = '$book_id';");

header('Location: /Re-Books/admin.php');
?>