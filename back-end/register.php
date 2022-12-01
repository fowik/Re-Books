<?php
    require_once("connect.php");

    session_start();
    if(isset($_SESSION['lietotajvards']) && isset($_SESSION['ID']))
        header("Location: index.php");

    if (isset($_POST['RegPoga'])){
        $epasts = $_POST['epasts'];
        $atkartots_epasts = $_POST['atkartots_epasts'];
        $lietotajvards = $_POST['lietotajvards'];
        $parole = $_POST['parole'];
        $atkartota_parole = $_POST['atkartota_parole'];
        echo "0";
    }

    if ($epasts !="" && $atkartots_epasts !="" && $lietotajvards !="" && $parole !="" && $atkartota_parole !=""){
        echo "1";
        if ($parole === $atkartota_parole){
            echo "2";
            if ($epasts === $atkartots_epasts){
                echo "3";
                if (filter_var($epasts, FILTER_VALIDATE_EMAIL) != false){
                    echo "4";
                    if ( strlen($parole) >= 8 && strpbrk($parole, "!#$.,:;()") != false) {
                        echo "5";
                        $query = mysqli_query($conn, "SELECT * FROM user WHERE Username='{$lietotajvards}' OR Email='{$epasts}'");
                        if (mysqli_num_rows($query) == 0){
                            $id = '';
                            $parole = password_hash($parole, PASSWORD_DEFAULT);
                            $admin = 0;

                            mysqli_query($conn, "INSERT INTO user VALUES (
                                '{$id}', '{$epasts}', '{$lietotajvards}', '{$parole}', '{$admin}'
                            )");
                            echo "6";
                            $query = mysqli_query($conn, "SELECT * FROM user WHERE Username='{$lietotajvards}'");
                            if (mysqli_num_rows($query) == 1) {
                                echo "nice";
                                $success = true;
                            }
                        else
                            $error = 'Kļūme notika veidojot jūsu profilu.';
                        }
                    else
                        $error = 'Šis lietotājvārds tiek jau izmantots. Izmantojiet citu.';
                    }
                else
                    $error = 'Jūsu parole ir pārāk vāja. Ievadiet paroli vismaz 8 simbolus garu, kas iekļauj Lielo burtu un simbolu!';
                }
            else
                $error = 'Jūs neesat ievadijuši pareizu e-pastu!';
            }
        else
            $error = 'Jūsu e-pasta adrese nesakrīt!';
        }
    else
        $error = 'Jūsu parole nesakrīt!';
    }
else
    $error = 'Jūs atstājā tukšu lauku';
?>