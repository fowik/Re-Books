<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/user.css">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <title>Username</title>
</head>
<body>

    <div class="wrapper">
        <?php include 'views/Nav-Bar.php';?>

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

                        <a href="../back-end/logout.php"><button class="leave-button">Iziet</button></a>
                    </div>

                    <div class="books-table scroll">

                        <div class="fav-book-container">
                            <include src="fav-book.html"></include>

                        </div>

                    </div>
                </div>
                    
            </div>
        </div>

        <?php include 'views/footer.html';?>

    </div>

    
    <script src="jquery.js"></script>
</body>
</html>