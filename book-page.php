<?php
    session_start();
    require_once "vendor/connect.php";

    //Exact book output
    $book_id = $_GET['bookID'];
    $book = "SELECT * FROM `books` WHERE `bookID` = '$book_id'";
    $book_result = mysqli_query($conn, $book) or die("Connection failed");
    $book_result = mysqli_fetch_assoc($book_result);

    //rating
    if (isset($_POST['save'])) {
        $userID = $_SESSION['user']['userID'];
        $uID = $conn->real_escape_string($_POST['uID']);
        $ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
        $ratedIndex++;

        if (!$uID) {
            $conn->query("INSERT INTO `ratingsystem` (`rateIndex`, `FK_userID`) VALUES ('$ratedIndex', '$userID')");
            $sql = $conn->query("SELECT id FROM ratingsystem ORDER BY id DESC LIMIT 1");
            $uData = $sql->fetch_assoc();
            $uID = $uData['id'];
        } else
            $conn->query("UPDATE ratingsystem SET rateIndex='$ratedIndex' WHERE id='$uID'");

        exit(json_encode(array('id' => $uID)));
        header("Location: ../");
    }

    $sql = $conn->query("SELECT id FROM ratingsystem");
    $numR = $sql->num_rows;

    $sql = $conn->query("SELECT SUM(rateIndex) AS total FROM ratingsystem");
    $rData = $sql->fetch_array();
    $total = $rData['total'];

    $avg = $total / $numR;
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

                    <div class="rating">Vērtējums: 
                        <i class="fa fa-star fa-2x" data-index="0"></i>
                        <i class="fa fa-star fa-2x" data-index="1"></i>
                        <i class="fa fa-star fa-2x" data-index="2"></i>
                        <i class="fa fa-star fa-2x" data-index="3"></i>
                        <i class="fa fa-star fa-2x" data-index="4"></i>
                        <br>
                        <?php echo round($avg,2) ?>
                    </div>

                    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
                    <script>
                        var ratedIndex = -1, uID = 0;

                        $(document).ready(function () {
                            resetStarColors();

                            if (localStorage.getItem('ratedIndex') != null) {
                                setStars(parseInt(localStorage.getItem('ratedIndex')));
                                uID = localStorage.getItem('uID');
                            }

                            $('.fa-star').on('click', function () {
                            ratedIndex = parseInt($(this).data('index'));
                            localStorage.setItem('ratedIndex', ratedIndex);
                            saveToTheDB();
                            });

                            $('.fa-star').mouseover(function () {
                                resetStarColors();
                                var currentIndex = parseInt($(this).data('index'));
                                setStars(currentIndex);
                            });

                            $('.fa-star').mouseleave(function () {
                                resetStarColors();

                                if (ratedIndex != -1)
                                    setStars(ratedIndex);
                            });
                        });

                        function saveToTheDB() {
                            $.ajax({
                            url: "book-page.php",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                save: 1,
                                uID: uID,
                                ratedIndex: ratedIndex
                            }, success: function (r) {
                                    uID = r.id;
                                    localStorage.setItem('uID', uID);
                            }
                            });
                        }

                        function setStars(max) {
                            for (var i=0; i <= max; i++)
                                $('.fa-star:eq('+i+')').css('color', 'orange');
                        }

                        function resetStarColors() {
                            $('.fa-star').css('color', 'white');
                        }
                    </script>

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