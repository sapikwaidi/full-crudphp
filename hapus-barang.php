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

    $id_barang = (int)$_GET['id_barang'];

    if(delete_barang($id_barang)){
        echo "<script>
                    alert('Data Berhasil di Hapus');
                    document.location.href='index.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data Berhasil di Hapus');
                    document.location.href='index.php';
                </script>";
        }   
?>