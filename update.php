<?php
    include "vendor/connect.php";

    $book_id = $_GET['bookID'];
    //print_r($book_id);
    $book = mysqli_query($conn, "SELECT * FROM `books` WHERE bookID = '$book_id'");
    $book = mysqli_fetch_assoc($book);
    //print_r($book);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/nav-bar.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/update.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Udpate book</title>
</head>
<body>
    <div class='main'>
    <div class="add-menu popUpWrapper">
        <!-- <a onclick="closePopup()"><button class="closePopup" id="closePopup">X</button></a> -->
        <form action="vendor/updatebook.php" method="POST" enctype="multipart/form-data"> 
            <div class="popUpInputs">
                <h1>Atjaunot</h1>
                <input type="hidden" name="Book_ID" value="<?=$book['bookID'];?>">
                <p>Nosaukums</p>
                <input type="text" name="Title" value="<?=$book['title'];?>">
                <p>Autors</p>
                <input type="text" name="Author" value="<?=$book['author'];?>">
                <p>Apraksts</p>
                <input type="text" name="Description" value="<?=$book['description'];?>">
                <p>Bilde</p>
                <img src="<?= $book['image']?>" alt="" width="170px" height="220px">
                <br>
                <input type="file" name="image">
                <p>Kategorija</p>
                <input type="text" name="Category" value="<?=$book['category'];?>">
                <p>Datums</p>
                <input type="date" name="Date" value="<?=$book['date'];?>">
                <p>Rating</p>
                <input type="text" name="Rating" value="<?=$book['rating'];?>">
                <div style="margin-top: 20px;">
                    <button type="submit" class="update-book" name="update-book">Atjaunot grāmatu</button>
                <div>
            </div>
        </form>   
    </div>  
    </div>
</body>
</html>

