<?php
    session_start();
    require_once "vendor/connect.php";

    $book_id = $_GET['bookID'];
    $book = "SELECT * FROM `books` WHERE `bookID` = '$book_id'";
    $book_result = mysqli_query($conn, $book) or die("Connection failed");
    $book_result = mysqli_fetch_assoc($book_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/nav-bar.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/book-page.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <title><?= $book_result['title']; ?></title>
</head>

<body>

    <?php include 'assets/views/nav-bar.php';?>

    <div class="wrapper">

        <div class="main">
            <div class="book-view">

            <div class="book-cover">
                <div class="book-img">
                    <img src="<?= $book_result['image']; ?>" alt="" width="250" height="300px">
                </div>
            </div>
                    <div class="book-content">
                    <h1><?= $book_result['title']; ?></h1>
                    <h2><?= $book_result['author']; ?></h2>

                    <h2>Vērtējums: 
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </h2>

                    <div class="button-read">
                        <a href="">Lasīt</a> <a href="vendor/addfavourites.php?bookID=<?=$book_id;?>">Pievieont</a>
                        <?php 
                            if (isset($_SESSION['message'])) {
                            echo '<p class="msg"> ' . $_SESSION['message'] .'</p>';
                            }
                            unset($_SESSION['message']);
                        ?>
                    </div>
                </div>
            </div>

            <div class="book-description">
                <h1>Apraksts</h1>
                <p><?= $book_result['description']; ?></p>
            </div>
        </div>

        <?php include 'assets/views/footer.html';?>

    </div>
    
    <script src="./jquery.js"></script>
</body>
</html>