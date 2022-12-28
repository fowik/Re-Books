<?php
    include "vendor/connect.php";

    $book_id = $_GET['bookID'];
    print_r($book_id);
    $book = mysqli_query($conn, "SELECT * FROM `books` WHERE Book_ID = '$book_id'");
    $book = mysqli_fetch_assoc($book);
    //print_r($book);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Udpate book</title>
</head>
<body>
    <div class="add-menu popUpWrapper">
        <a onclick="closePopup()"><button class="closePopup" id="closePopup">X</button></a>
        <form action="updatebook.php" method="POST"> 
            <div class="popUpInputs">
                    <p>Update</p>
                    <input type="text" name="Book_ID" value="<?=$book['Book_ID'];?>">
                    <p>Nosaukums</p>
                    <input type="text" class="Title" id="Title" name="Title" value="<?=$book['Title'];?>">
                    <p>Bilde</p>
                    <input type="file" class="Image" id="Image" name="Image" value="<?=$book['Image'];?>">
                    <p>Rating</p>
                    <input type="number" class="Title" id="Title" name="Rating" value="<?=$book['Rating'];?>">
                    <p>Description</p>
                    <input type="text" name="Description" value="<?=$book['Description'];?>">
                    <button class="update-book" name="update-book">Atjaunot grāmatu</button>
            </div>
        </form>   
    </div>  
</body>
</html>

