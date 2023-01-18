<?php
include "connect.php";

//Book update
$book_id = $_POST['Book_ID'];
$title = $_POST['Title'];
$author = $_POST['Author'];
$descirption = $_POST['Description'];
$image = $_FILES['image'];
$category = $_POST['Category'];
$date = $_POST['Date'];

$path = 'uploads/' . time() . $_FILES['image']['name'];
echo $path;
move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path);

mysqli_query($conn, "UPDATE `books` SET `title` = '$title', `author` = '$author', `description` = '$descirption', `image` = '$path', `category` = '$category', `date` = '$date' WHERE `books`.`bookID` = '$book_id';");

header('Location: /Re-Books/admin.php');
?>