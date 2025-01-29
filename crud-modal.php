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
$title='Daftar Account';

include("layout/header.php");

// show data akun
$data_akun=select("SELECT * FROM akun");

// show data base on user login
$id_akun=$_SESSION["id_akun"];
// echo $_SESSION['level'];
// die;
$data_bylogin=select("SELECT * FROM akun WHERE id_akun = $id_akun");

if(isset($_POST['tambah'])){
    if(create_akun($_POST) > 0){
        echo "<script>
                alert('Data Berhasil di tambah');
                document.location.href='crud-modal.php';
            </script>";
    }else{
        echo "<script>
                alert('Data gagal di tambah');
                document.location.href='crud-modal.php';
            </script>";
    }
}

if(isset($_POST['ubah'])){
    if(update_akun($_POST) > 0){
        echo "<script>
                alert('Data Berhasil di ubah');
                document.location.href='crud-modal.php';
            </script>";
    }else{
        echo "<script>
                alert('Data gagal di ubah');
                document.location.href='crud-modal.php';
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
                        <h1 class="m-0">Data Account</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Data Account</li>
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
                                            <h3 class="card-title">Table Data Account</h3>
                                        </div>

                                        <!-- content replace -->
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <!-- <a href="tambah-barang.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>Tambah</a> -->
                                            <?php if($_SESSION['level'] == 1) : ?>
                                                <button type="button" class="btn btn-primary mb-1 btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i>Tambah</button>
                                            <?php endif; ?>
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <th >No.</th>
                                                    <th>Nama</th>
                                                    <th >Username</th>
                                                    <th >Email</th>
                                                    <th>Password</th>
                                                    <th class="text-center">Aksi</th>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <!-- show all data -->
                                                    <?php if($_SESSION["level"] == 1): ?>
                                                        
                                                        <?php foreach($data_akun as $akun) : ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $akun['nama']; ?></td>
                                                                <td><?= $akun['username']; ?></td>
                                                                <td><?= $akun['email']; ?></td>
                                                                <td><?= $akun['password']; ?></td>
                                                                <td class="text-center" width="15%">
                                                                    <button type="button" class="btn btn-success mb-1 btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun'];?>"><i class="fas fa-edit"></i>Ubah</button>
                                                                    <button type="button" class="btn btn-danger mb-1 btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun'];?>"><i class="fas fa-trash-alt"></i>Hapus</button>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                        <?php else: ?>
                                                        <!-- show data base on id_akun -->
                                                        <?php foreach($data_bylogin as $akun) : ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $akun['nama']; ?></td>
                                                                <td><?= $akun['username']; ?></td>
                                                                <td><?= $akun['email']; ?></td>
                                                                <td><?= $akun['password']; ?></td>
                                                                <td class="text-center">
                                                                    <button type="button" class="btn btn-success mb-1 btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun'];?>"><i class="fas fa-edit"></i>Ubah</button>
                                                                    <!-- <button type="button" class="btn btn-danger mb-1 btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun'];?>"><i class="fas fa-trash-alt"></i>Hapus</button> -->
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
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

        <!-- modal -->
        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required/>
                            </div>
        
                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required/>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required/>
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required/>
                            </div>

                            <div class="mb-3">
                                <label for="level">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="">-- pilih level --</option>
                                    <option value="1">-- Admin --</option>
                                    <option value="2">-- operator barang--</option>
                                    <option value="3">-- operator mahasiswa--</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit"name="tambah" class="btn btn-primary">Tambah</button>
                            </div>

                        </form>
                    </div>
                    <!-- end modal-body -->
                </div>
                <!-- end modal-content -->
            </div>
            <!-- end modal-dialog -->
        </div>
        <!-- end Modal Tambah -->
        
        <?php foreach($data_akun as $akun) : ?>
            <!-- Modal Ubah -->
            <div class="modal fade" id="modalUbah<?= $akun['id_akun'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <form action="" method="post">
                                <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">
                                <div class="mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']; ?>" required/>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $akun['username']; ?>" required/>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $akun['email']; ?>" required/>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password">Password <small>(Masukan password baru/lama)</small></label>
                                    <input type="password" name="password" id="password" class="form-control" required/>
                                </div>
                                
                                <?php if($_SESSION['level'] == 1): ?>
                                    <div class="mb-3">
                                        <label for="level">Level</label>
                                        <select name="level" id="level" class="form-control" required>
                                            <?php $level = $akun['level']; ?>
                                            <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                                            <option value="2" <?= $level == '2' ? 'selected' : null ?>>operator barang</option>
                                            <option value="3" <?= $level == '3' ? 'selected' : null ?>>operator mahasiswa</option>
                                        </select>
                                    </div>
                                    <?php else: ?>
                                        <input type="hidden" name="level" value="<?= $akun['level']; ?>">
                                <?php endif; ?>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                    <button type="submit"name="ubah" class="btn btn-success">Ubah</button>
                                </div>
                            </form>
                        </div>
                        <!-- end modal-content -->
                    </div>
                    <!-- end modal-body -->
                </div>
                <!-- end modal-dialog -->
            </div>
            <!-- end Modal Ubah -->
        <?php endforeach; ?>
        
        <!-- Modal Hapus -->
        <?php foreach($data_akun as $akun): ?>
            <div class="modal fade" id="modalHapus<?= $akun['id_akun'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p>Yakin ingin mengahups Akun : <?= $akun['nama']; ?> .?</p>
                        </div>
                        <!-- end modal-body -->
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger">Hapus</a>
                        </div>

                    </div>
                    <!-- end modal-content -->
                </div>
                <!-- end modal-dialog -->
            </div>
            <!-- end Modal Hapus -->
        <?php endforeach; ?>
        <!-- end modal -->
    </div>
    
<?php

    include("layout/footer.php");
    
?>