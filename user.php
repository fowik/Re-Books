<?php
    session_start();
    require_once "vendor/connect.php";

    if (!$_SESSION['user']) {
        header('Location: index.php');
    }

    if (isset($_SESSION['user'])) {
        $admin = $_SESSION['user']['admin'];
        //print_r($admin);

        if ($admin <> 0)
        {
            header('Location: ./admin.php');
        }
    }

    //favourite books output
    $user_id = $_SESSION['user']['userID'];
    $favoruites = 
    "SELECT * 
    FROM `favourites` 
    INNER JOIN `books` 
        ON `favourites`.`FK_booksID` = `books`.`bookID` 
    INNER JOIN `users` 
        ON `favourites`.`FK_userID` = `users`.`userID`
    WHERE `FK_userID` = '$user_id'";
    
    //echo $favoruites;
    $favoruites_result = mysqli_query($conn, $favoruites) or die("Connection failed");
    
    for ($favoruitedata = []; $row = mysqli_fetch_assoc($favoruites_result); $favoruitedata[] = $row);

    //book delete from favourites
    if (isset($_GET['delfav'])) {
        $favourite_id = $_GET['delfav'];

        $books_del = "DELETE FROM `favourites` WHERE `favouritesID` = $favourite_id";
        //echo $books_del;
        mysqli_query($conn, $books_del) or die(mysqli_error($conn));
        header('Location: ./admin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/user.css">
    <link rel="stylesheet" href="./assets/css/nav-bar.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <title>Username</title>
</head>
<body>

    <div class="wrapper">
        <?php include 'assets/views/nav-bar.php';?>

        <div class="main">
            <div>
                <div class="container vl">
                    <!-- <a href="#"> -->
                        <div class="title hl">
                            <h1>Re-<span>Books</span></h1>
                        </div>
                    <!-- </a> -->
                    <a href="#">
                        <div class="books hl"> 
                            <h2>Gr??matas</h2>
                        </div>
                    </a>
                </div>
                <div class="information-container">
                    
                    <div class="search-area">
                        <div class="search-bar">
                            <input type="text" placeholder="Mekl??t...">
                            <button>Mekl??t</button>
                        </div>
                        <!-- <h2><?= $_SESSION['user']['username']?></h2> -->
                        <a class="leave-button" href="vendor/sign/logout.php">Iziet</a>
                    </div>

                    <div class="books-table scroll">

                        <div class="fav-book-container">
                            <?php foreach ($favoruitedata as $favoruite) { ?>
                                <div class="fav-book">
                                    <div>
                                        <h2><?= $favoruite['title'] ?></h2>
                                    </div>
                                    <div class="object-to-right">
                                        <a href="book-page.php?bookID=<?= $favoruite['bookID']; ?>" class="read-button">Las??t</a> 
                                        <a href="?delfav=<?=$favoruite['favouritesID'];?>"><button class="delete-button">Dz??st</button></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>

        <?php include 'assets/views/footer.html';?>

    </div>

    
    <script src="jquery.js"></script>
</body>
</html>