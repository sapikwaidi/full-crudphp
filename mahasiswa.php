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

    // only user  as operator mahasiswa
    if($_SESSION["level"] != 1 and $_SESSION["level"] != 3){
        echo "<script>
                    alert('sory you have not access!');
                    document.location.href='crud-modal.php';
        </script>";

        exit;
    }

    $title='Data Mahasiswa';
    
    include 'layout/header.php';

    $data_mahasiswa=select("SELECT * FROM  mahasiswa ORDER BY id_mahasiswa DESC");
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Mahasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                                            <h3 class="card-title">Table Data Mahasiswa</h3>
                                        </div>

                                        <!-- content replace -->
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <a href="tambah-barang.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>Tambah</a>

                                            <a href="download-excel-mahasiswa.php" class="btn btn-success btn-sm mb-1"><i class="fas fa-file-excel"></i>Download</a>

                                            <a href="download-pdf-mahasiswa.php" class="btn btn-danger btn-sm mb-1"><i class="fas fa-file-pdf"></i>Download</a>
                                            
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <th class="text-center">No.</th>
                                                    <th>Nama</th>
                                                    <th>Prodi</th>
                                                    <th>Jenis Kelamin</th> 
                                                    <th>Telepon</th>
                                                    <th class="text-center">Aksi</th>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach($data_mahasiswa as $mahasiswa) : ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $mahasiswa['nama']; ?></td>
                                                            <td><?= $mahasiswa['prodi']; ?></td>
                                                            <td><?= $mahasiswa['jk']; ?></td>
                                                            <td><?= $mahasiswa['telepon']; ?></td>
                                                            <td width="20%" class="text-center">
                                                                <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm">Detail</a>
                                                                <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a>
                                                                <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger btn-sm"" onclick="return confirm('data will delete?');"><i class="fas fa-trash"></i>Hapus</a>
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