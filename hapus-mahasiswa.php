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

    $id_mahasiswa = (int)$_GET['id_mahasiswa'];

    if(delete_mahasiswa($id_mahasiswa)){
        echo "<script>
                    alert('Data Berhasil di Hapus');
                    document.location.href='mahasiswa.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data Berhasil di Hapus');
                    document.location.href='mahasiswa.php';
                </script>";
        }   
?>