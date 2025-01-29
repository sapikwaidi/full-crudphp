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
    include 'config/app.php';

    $id_akun = (int)$_GET['id_akun'];

    if(delete_akun($id_akun)){
        echo "<script>
                    alert('Data Berhasil di Hapus');
                    document.location.href='crud-modal.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data Berhasil di Hapus');
                    document.location.href='crud-modal.php';
                </script>";
        }   
?>