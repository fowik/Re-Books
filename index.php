<?php
    session_start();
    require_once "vendor/connect.php";

    //Books output
    $books = "SELECT * FROM books";
    $books_result = mysqli_query($conn, $books) or die("Connection failed");

    for ($bookdata = []; $row = mysqli_fetch_assoc($books_result); $bookdata[] = $row);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/nav-bar.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/book.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Re-Books</title>
</head>
<body>

    <div class="wrapper">
        
        <?php include 'assets/views/nav-bar.php';?>
        
        <div class="main">

            <div class="search-area">
                <div class="search-bar">
                    <input type="text" placeholder="Meklēt...">
                    <button>Meklēt</button>
                </div>
                <div class="category-bar">
                    <select name="category" id="category">
                        <option value="category" disabled selected>Kategorijas</option>
                        <option value="drama">Drama</option>
                    </select>
                </div>
            </div>
            <hr color="#34344A">
            <div class="slider swiper">
                <div class="new-books">
                    <h1>Jaunākās</h1>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($bookdata as $book) { ?>
                                <div class="swiper-slide">
                                    <div class="book-cover mySwiper">
                                        <span class="link">
                                            <a href="book-page.php?bookID=<?=$book['bookID'];?>">
                                                <div class="book-img slide">
                                                    <img src="<?= $book['image']?>" alt="" width="170px" height="220px">
                                                </div>
                                            </a>
                                            <div class="book-title">
                                                <p class="book-name"><?= $book['title'] ?></p>
                                                <p class="author"><?= $book['author'] ?></p>
                                                <p class="rating-stars">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                </p>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
            <hr color="#34344A">
            <div class="slider swiper">
                <div class="new-books">
                    <h1>Visaugstāk novērtētās</h1>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
            <hr color="#34344A">
            <div class="slider swiper">
                <div class="new-books">
                    <h1>Populārākās</h1>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include './assets/views/footer.html';?>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="./assets/js/jquery.js"></script>

</body>
</html>