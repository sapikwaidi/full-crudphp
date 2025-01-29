<?php
session_start();

 // restricted page
    if(!isset($_SESSION["login"])){
        echo "<script>
                    alert('please login first');
                    document.location.href='login.php';
        </script>";

        exit;
    }

    // kosongkan session user login
    $_SESSION=[];
    session_unset();
    session_destroy();
    header("Location: login.php");

?>