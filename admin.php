<?php
    session_start();
    require_once "vendor/connect.php";

    //Session check
    if (!$_SESSION['user']) {
        $admin = $_SESSION['user']['admin'];
        //print_r($admin);
        
        if ($admin <> 1)
        {
            header('Location: ./index.php');
        }
    }

    //Admin check
    if (isset($_SESSION['user'])) {
        $admin = $_SESSION['user']['admin'];
        //print_r($admin);
        
        if ($admin <> 1)
        {
            header('Location: ./user.php');
        }
    }

    //Books delete
    if (isset($_GET['delbook'])) {
        $book_id = $_GET['delbook'];

        $books_del = "DELETE FROM `books` WHERE `bookID` = $book_id";
        //echo $books_del;
        mysqli_query($conn, $books_del) or die(mysqli_error($conn));
        header('Location: ./admin.php');
    }

    //Books add
    if (isset($_POST['add-book'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        
        $path = 'uploads/' . time() . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], './' . $path);

        $books_add = "INSERT INTO `books` (`title`, `author`, `description`, `image`, `category`, `date`) VALUES ('$title', '$author', '$description', '$path', '$category', '$date')";
        mysqli_query($conn, $books_add) or die(mysqli_error($conn));
        header('Location: ./admin.php');
    } 

    // //Books update
    // if (isset($_GET['edit-book'])) {
    //     $book_id = $_GET['bookID'];
    //     print_r($book_id);
    //     $book = mysqli_query($conn, "SELECT * FROM `books` WHERE `bookID` = '$book_id'");
    //     $book = mysqli_fetch_assoc($book);
    //     print_r($book);
    // }

    //Books output
    $books = "SELECT * FROM `books`";
    $books_result = mysqli_query($conn, $books) or die("Connection failed");

    for ($bookdata = []; $row = mysqli_fetch_assoc($books_result); $bookdata[] = $row);

    //Users output
    $users = "SELECT * FROM `users`";
    $users_result = mysqli_query($conn, $users) or die("Connection failed");

    for ($userdata = []; $row = mysqli_fetch_assoc($users_result); $userdata[] = $row);

    //User delete
    if (isset($_GET['deluser'])) {
        $user_id = $_GET['deluser'];

        $users_del = "DELETE FROM `users` WHERE userID = $user_id";
        //echo $books_del;
        mysqli_query($conn, $users_del) or die(mysqli_error($conn));
        
        header('Location: ./admin.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/nav-bar.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <title>Admin panel</title>
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

                        <a href="vendor/sign/logout.php" class="leave-button">Iziet</a>
                    </div>

                    <div class="books-table scroll" id="books">
                        <div class="fav-book-container">
                            <?php foreach ($bookdata as $book) { ?>
                                <div class="fav-book">
                                    <div>
                                        <h2><?= $book['title'] ?> <?= $book['bookID'] ?></h2>
                                    </div>
                                    <div class="object-to-right">
                                        <a href="book-page.php?bookID=<?=$book['bookID'];?>"><button class="read-button" >Lasīt</button></a>
                                        <a href="update.php?bookID=<?=$book['bookID'];?>" class="edit-button" name="edit-book">Redigēt</a>
                                        <a href="?delbook=<?=$book['bookID'];?>">
                                            <button class="delete-button">Dzēst</button>
                                        </a>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    
                    <div class="books-table scroll" id="users" style="display:none;">
                        <div class="fav-book-container">
                            <?php foreach ($userdata as $user) { ?>
                                <div class="fav-book">
                                    <div>
                                        <h2><?= $user['username'] ?> <?= $user['userID'] ?></h2>
                                    </div>
                                    <div class="object-to-right-users">
                                        <button class="edit-button">Redigēt</button>
                                        <a href="?deluser=<?=$user['userID'];?>"><button class="delete-button">Dzēst</button></a>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    
                    <button class="add-button" id="add-button" onclick="addBook()">Pievienot</button>
                    
                    <!-- <div class="editPopup" id="editPopup" style="display:none;">
                        <div class="add-menu popUpWrapper">
                        <a onclick="closePopup()"><button class="closePopup" id="closePopup">X</button></a>
                            <form action="updatebook.php" method="POST" enctype="multipart/form-data"> 
                                <div class="popUpInputs">
                                    <p>Update</p>
                                    <input type="text" name="BooksID" value="<?= $book['bookID']; ?>">
                                    <p>Nosaukums</p>
                                    <input type="text" class="Title" id="Title" name="Title" value="<?= $book['title']; ?>">
                                    <p>Bilde</p>
                                    <input type="file" class="Image" id="Image" name="image" value="<?= $book['image']; ?>">
                                    <p>Rating</p>
                                    <input type="number" class="Title" id="Title" name="Rating" value="<?= $book['rating']; ?>">
                                    <button class="update-book" name="update-book">Atjaunot grāmatu</button>
                                </div>
                            </form>   
                        </div>  
                    </div> -->

                    <div class="addPopup" id="addPopup" style="display:none;">
                        <form class="add-menu popUpWrapper" method="POST" enctype="multipart/form-data">
                            <a onclick="closePopup()"><button class="closePopup" id="closePopup">X</button></a>
                            <div class="popUpInputs">
                                <label>Nosaukums</label>
                                <input type="text"  name="title" placeholder="Nosaukums">
                                <label>Autors</label>
                                <input type="text"  name="author" placeholder="Autors">
                                <label>Apraksts</label>
                                <input type="text"  name="description" placeholder="Apraksts">
                                <label>Bilde</label>
                                <input type="file"  name="image" placeholder="Image">
                                <label>Kategorija</label>
                                <input type="text"  name="category" placeholder="Kategorija">
                                <label>Datums</label>
                                <input type="date"  name="date" placeholder="Datums">
                                
                                <button type="sumbit" class="add-book" name="add-book">Pievienot grāmatu</button>
                            </div>
                        </form>      
                    </div>
                </div>
            </div>
        </div>

        <?php include 'assets/views/footer.html';?>

    </div>

    <script src="./assets/js/jquery.js"></script>
</body>
</html>