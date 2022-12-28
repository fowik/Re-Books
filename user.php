<?php
    session_start();

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
                            <h2>Grāmatas</h2>
                        </div>
                    </a>
                </div>
                <div class="information-container">
                    
                    <div class="search-area">
                        <div class="search-bar">
                            <input type="text" placeholder="Meklēt...">
                            <button>Meklēt</button>
                        </div>
                        <!-- <h2><?= $_SESSION['user']['username']?></h2> -->
                        <a class="leave-button" href="vendor/sign/logout.php">Iziet</a>
                    </div>

                    <div class="books-table scroll">

                        <div class="fav-book-container">
                            <include src="fav-book.html"></include>

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