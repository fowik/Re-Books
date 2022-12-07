<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <title>Registration</title>
</head>
<body>

    <div class="wrapper">

      <?php include 'views/Nav-Bar.html';?>

        <div class="main">
            <form action="./back-end/register.php" method="POST">
                <div id="registracija">
                  <h1>Reģistrācija</h1>
                  <?php
                    if(!empty($_SESSION["error"])){
                      echo "<p>{$_SESSION["error"]}</p>";
                      unset($_SESSION["error"]);
                    }
                  ?>
                  <p>Ievadiet savus datus lai izveidotu profilu.</p>
                  <hr>
              
                  <label for="e-pasts"><b>E-pasts</b></label>
                  <input type="text" placeholder="Ievadiet e-pastu" name="epasts" id="e-pasts" required onpaste="return false;">

                  <label for="e-pasts"><b>Atkārtojiet E-pastu</b></label>
                  <input type="text" placeholder="Ievadiet e-pastu vēlreiz" name="atkartots_epasts" id="e-pasts" required onpaste="return false;">

                  <label for="lietotajvards"><b>Lietotājvārds</b></label>
                  <input type="text" placeholder="Ievadiet lietotājvārdu" name="lietotajvards" id="lietotajvards" required onpaste="return false;">
              
                  <label for="parole"><b>Parole</b></label>
                  <input type="password" placeholder="Ievadiet paroli" name="parole" id="parole" required onpaste="return false;">
              
                  <label for="atkartota-parole"><b>Atkārtojiet paroli</b></label>
                  <input type="password" placeholder="Ievadiet paroli vēlreiz" name="atkartota_parole" id="atkartota-parole" required onpaste="return false;">

                  <hr>
                  <p>Veidojot profilu jūs piekrītat <a href="" style="color: rgb(203, 233, 255);">lietošanas un privātuma noteikumiem</a>.</p>
                  <button type="submit" name="RegPoga" class="registracijas_poga">Reģistrēties</button>

                  <div class="pieslegties_logs">
                    <p>Profils jau izveidots? <a style="color: rgb(203, 233, 255); cursor: pointer;" onclick="pieslegties()">Pieslēgties</a>.</p>
                  </div>
                </div>
            </form>

            <form action="./back-end/login.php" method="POST">
                <div id="pieslegties" style="display:none;">
                  <h1>Pieslēgties</h1>
                  <p>Ievadiet lietotājvārdu un paroli.</p>
                  <hr>

                  <label for="lietotajvards"><b>Lietotājvārds</b></label>
                  <input type="text" placeholder="Ievadiet lietotājvārdu" name="lietotajvards" id="lietotajvards" required onpaste="return false;">
              
                  <label for="parole"><b>Parole</b></label>
                  <input type="password" placeholder="Ievadiet paroli" name="parole" id="parole" required onpaste="return false;">
                  <?php
                  if(!empty($_SESSION["error"])){
                      echo "<p>{$_SESSION["error"]}</p>";
                      unset($_SESSION["error"]);
                    }
                  ?>
                  <hr>
                  
                  <p><a style="color: rgb(203, 233, 255); cursor: pointer;" onclick="atjaunot_paroli()">Aizmirsāt lietotājvārdu un paroli</a>?</p>
                  <button type="submit" name="Pieslegties" class="pieslegties_poga">Pieslēgties</button>

                                
                  <div class="registracijas_logs">
                    <p>Neesiet vēl reģistrējušies? <a style="color: rgb(203, 233, 255); cursor: pointer;" onclick="registreties()">Reģistrēties</a>.</p>
                  </div>
                </div>
            </form>

              <div id="atjaunot_paroli" style="display:none;">
                <h1 style="margin-top:10%;">Atjaunot paroli</h1>
                <p>Ievadiet e-pastu, lai atjaunotu paroli.</p>
                <hr>

                <label for="e-pasts"><b>E-pasts</b></label>
                <input type="text" placeholder="Ievadiet e-pastu" name="e-pasts" id="e-pasts" required onpaste="return false;">
                <hr>
              
                <button type="submit" class="atjaunot_poga" onclick="mainit_paroli()">Atjaunot</button>
              </div>

            <form action="register.html">
                <div id="mainit_paroli" style="display:none;">
                  <h1 style="margin-top:5%;">Mainīt paroli</h1>
                  <p>Ievadiet jauno paroli jūsu profilam.</p>
                  <hr>

                  <label for="parole"><b>Parole</b></label>
                  <input type="password" placeholder="Ievadiet paroli" name="parole" id="parole" required onpaste="return false;">
              
                  <label for="atkartota-parole"><b>Atkārtojiet paroli</b></label>
                  <input type="password" placeholder="Ievadiet paroli vēlreiz" name="atkartota-parole" id="atkartota-parole" required onpaste="return false;">
                  <hr>
              
                  <button type="submit" class="mainit_poga">Mainīt</button>
                </div>
            </form>
            
        </div>

        <?php include 'views/footer.html';?>
        
    </div>
    <?php
          if(!empty($_SESSION["change"])){
            echo "<script type=\"text/javascript\">{$_SESSION["change"]}</script>";
            unset($_SESSION["change"]);
          }
    ?>
    <script src="jquery.js"></script>
</body>
</html>