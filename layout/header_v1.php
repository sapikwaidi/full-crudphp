<?php
    include 'config/app.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">

        <title><?php echo $title ; ?></title>
        <!-- load ckeditor -->
        <script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>
        <!-- end load ckeditor -->
    </head>
    <body>
        <!-- start navbar -->
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.php">SIBER</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <!-- show only admin and operator barang -->
                            <?php if($_SESSION['level'] == 1 or $_SESSION['level'] == 2): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Data</a>
                                </li>
                            <?php endif; ?>
                            <!-- end show only admin and operator barang -->
                        
                            <!-- show only admin and operator barang -->
                            <?php if($_SESSION['level'] == 1 or $_SESSION['level'] == 3): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                                </li>
                            <?php endif; ?>
                            <!-- end show only admin and operator barang -->

                            <li class="nav-item">
                            <a class="nav-link" href="crud-modal.php">Akun</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure out?')">Logout</a>
                            </li>
                        </ul>

                    </div>
                    
                    <div class="nav-item" style="float:right">
                        <a class="navbar-brand">Hai: <?= $_SESSION['nama']; ?></a>
                    </div>
                    <!-- <div>
                        <a class="navbar-brand">Hai: <?= $_SESSION['nama']; ?></a>
                    </div> -->
                </div>
            </nav>
        </div>
        <!-- akhir navbar -->