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

    $title='Detail Mahasiswa';

    include "layout/header.php";

    $id_barang = $_GET['id_barang'];
    // var_dump($id_barang);
    // die;

    $barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

    if(isset($_POST['ubah'])){
        if(update_barang($_POST) > 0){
            echo "<script>
                    alert('Data Berhasil di Ubah');
                    document.location.href='index.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data gagal Berhasil di Ubah');
                    document.location.href='index.php';
                </script>";
        }
    }

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><i class="fas fa-edit"></i></i>Ubah Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Data Barang</a></li>
                            <li class="breadcrumb-item active">Ubah Barang</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="" method="post">

                    <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label" >LP / LI</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']; ?>" placeholder="nama barang...."  required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Pangkat</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah"  value="<?= $barang['jumlah']; ?>" placeholder="jumlah barang...." required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">NRP</label>
                        <input type="number" class="form-control" id="harga" name="harga"  value="<?= $barang['harga']; ?>" placeholder="harga barang...." required>
                    </div>

                    <button type="submit" name="ubah" class="btn btn-primary" style="float: right">Ubah</button>
                </form>
                
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    
<?php

    include("layout/footer.php");
    
?>