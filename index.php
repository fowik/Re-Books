<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/book.css">
    <link rel="stylesheet" href="./css/index.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Re-Books</title>
</head>
<body>

    <div class="wrapper">
        
        <?php include 'views/Nav-Bar.html';?>
        
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
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
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
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
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
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                            <?php include 'book.html';?>
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'views/footer.html';?>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="jquery.js"></script>

</body>
</html>