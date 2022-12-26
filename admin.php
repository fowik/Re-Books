<?php
include "back-end/connect.php";

//Books delete
if (isset($_GET['del'])) {
    $book_id = $_GET['del'];

    $books_del = "DELETE FROM books WHERE BooksID = $book_id";
    //echo $books_del;
    mysqli_query($conn, $books_del) or die(mysqli_error($conn));
    header('Location: /Re-Books/admin.php');
}

//Books insert
if (isset($_POST['add-book'])) {
    $title = $_POST['Title'];
    $image = $_POST['Image'];

    $books_add = "INSERT INTO `books` (`Title`, `Image`, `Rating`) VALUES ('$title', '$image', NULL)";
    mysqli_query($conn, $books_add) or die(mysqli_error($conn));
    header('Location: /Re-Books/admin.php');
} 

//Books update
if (isset($_GET['edit-book'])) {
    $book_id = $_GET['BooksID'];
    print_r($book_id);
    $book = mysqli_query($conn, "SELECT * FROM `books` WHERE BooksID = '$book_id'");
    $book = mysqli_fetch_assoc($book);
    print_r($book);
}

//Books output
$books = "SELECT * FROM books";
$books_result = mysqli_query($conn, $books) or die("Connection failed");

for ($data = []; $row = mysqli_fetch_assoc($books_result); $data[] = $row);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <title>Admin panel</title>
</head>
<body>    

    <div class="wrapper">

        <?php include 'views/nav-bar.php';?>

        <div class="main">
            <div>
                <div class="container vl">
                    <!-- <a href="#"> -->
                        <div class="title hl">
                            <h1>Re-<span>Books</span></h1>
                        </div>
                    <!-- </a> -->
                    <a href="#" onclick="books()">
                        <div class="books hl"> 
                            <h2>Grāmatas</h2>
                        </div>
                    </a>

                    <a href="#" onclick="users()">
                        <div class="users hl">
                            <h2>Lietotāji</h2>
                        </div>
                    </a>
                </div>
                <div class="information-container">

                    <div class="search-area">
                        <div class="search-bar">
                            <input type="text" placeholder="Meklēt pēc nosaukuma">
                            <button>Meklēt</button>
                        </div>

                        <button class="leave-button">Iziet</button>
                    </div>

                    <div class="books-table scroll" id="books">
                        <div class="fav-book-container">
                            <?php foreach ($data as $book) { ?>
                                <div class="fav-book">
                                    <div>
                                        <h2><?= $book['Title'] ?> <?= $book['BooksID'] ?></h2>
                                    </div>
                                    <div class="object-to-right">
                                        <button class="read-button" >Lasīt</button>
                                        <a onclick="editBook()" href="update.php?BooksID=<?=$book['BooksID'];?>" class="edit-button" name="edit-book">Redigēt</a>
                                        <a href="?del=<?=$book['BooksID'];?>">
                                            <button class="delete-button">Dzēst</button>
                                        </a>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    
                    <div class="books-table scroll" id="users" style="display:none;">
                        <div class="fav-book-container">
                            <?php include 'username-admin.html';?>
                            
                        </div>
                    </div>
                    
                    <button class="add-button" id="add-button" onclick="addBook()">Pievienot</button>
                    
                    <div class="editPopup" id="editPopup" style="display:none;">
                        <div class="add-menu popUpWrapper">
                        <a onclick="closePopup()"><button class="closePopup" id="closePopup">X</button></a>
                            <form action="updatebook.php" method="POST"> 
                                <div class="popUpInputs">
                                    <p>Update</p>
                                    <input type="text" name="BooksID" value="<?= $book['BooksID']; ?>">
                                    <p>Nosaukums</p>
                                    <input type="text" class="Title" id="Title" name="Title" value="<?= $book['Title']; ?>">
                                    <p>Bilde</p>
                                    <input type="file" class="Image" id="Image" name="Image" value="<?= $book['Image']; ?>">
                                    <p>Rating</p>
                                    <input type="number" class="Title" id="Title" name="Rating" value="<?= $book['Rating']; ?>">
                                    <button class="update-book" name="update-book">Atjaunot grāmatu</button>
                                </div>
                            </form>   
                        </div>  
                    </div>

                    <div class="addPopup" id="addPopup" style="display:none;">
                        <form class="add-menu popUpWrapper" method="POST">
                            <a onclick="closePopup()"><button class="closePopup" id="closePopup">X</button></a>
                            <div class="popUpInputs">
                                <input type="text" class="Title" id="Title" name="Title" placeholder="Nosaukums">
                                <input type="file" class="Image" id="Image" name="Image" placeholder="Image">
                                <button class="add-book" name="add-book">Pievienot grāmatu</button>
                            </div>
                        </form>      
                    </div>
                </div>
            </div>
        </div>

        <?php include 'views/footer.html';?>

    </div>

    

    <script src="jquery.js"></script>
</body>
</html>