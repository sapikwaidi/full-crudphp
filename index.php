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

// only user  as operator barang
if($_SESSION["level"] != 1 and $_SESSION["level"] != 2){
    echo "<script>
                alert('sory you have not access!');
                document.location.href='crud-modal.php';
    </script>";

    exit;
}

$title = 'Dashboard';

include "layout/header.php";

$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Data Barang</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                <?php include('layout/sub_header.php'); ?>

                <!-- ./col -->
                </div>
                <!-- /.row -->
                
                <!-- <div class=""> -->
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Table Data Barang</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <a href="tambah-barang.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>Tambah</a>
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <th >No.</th>
                                                    <th>LP / LI</th>
                                                    <th >Pemohon</th>
                                                    <th>Pangkat</th> 
                                                    <th>Barcode</th> 
                                                    <th>NRP</th>
                                                    <th class="text-center">Aksi</th>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach($data_barang as $barang) : ?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $barang['nama']; ?></td>
                                                            <td><?=  $barang['jumlah']; ?></td>
                                                            <td>Rp.<?= number_format($barang['harga'], 2, ',', '.') ; ?></td>
                                                            <td><img alt="barcode" src="barcode.php?codetype=Code39&size=40&text=<?= $barang['barcode']; ?>&print=true" /></td>
                                                            <td><?=  date('d/m/y H:i:s', strtotime($barang['tanggal'])); ?></td>
                                                            <td width="15%" class="text-center">
                                                                <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success btn-sm">Ubah</a>
                                                                <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('data will delete?');">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <!-- </div> -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    
<?php

    include("layout/footer.php");
    
?>