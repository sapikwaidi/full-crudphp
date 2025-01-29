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

    $title='Ubah Mahasiswa';

    include "layout/header.php";

    $id_mahasiswa = (int)$_GET['id_mahasiswa'];
    // var_dump($id_mahasiswa);
    // die;

    $mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    // var_dump($mahasiswa['foto']);
    // die;
    if(isset($_POST['ubah'])){
        if(update_mahasiswa($_POST) > 0){
            echo "<script>
                    alert('Data Berhasil di Ubah');
                    document.location.href='mahasiswa.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data gagal Berhasil di Ubah');
                    document.location.href='mahasiswa.php';
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
                        <h1 class="m-0"><i class="fas fa-edit"></i></i>Ubah Mahasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="mahasiswa.php">Data Mahasiswa</a></li>
                            <li class="breadcrumb-item active">Ubah Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
                    <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto']; ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama mahasiswa...." required value="<?= $mahasiswa['nama']; ?>">
                    </div>
                    
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="nama" class="form-label">Program Studi</label>
                            <select type="text" class="form-control" id="prodi" name="prodi" required>
                                <!-- <option value="">-- pilih prodi --</option> -->
                                <?php $prodi = $mahasiswa['prodi']; ?>
                                <option value="Tehnik Informatika" <?= $prodi == 'Tehnik Informatika' ? 'selected' : null ; ?>>Tehnik Informatika</option>
                                <option value="Tehnik Mesin" <?= $prodi == 'Tehnik Mesin' ? 'selected' : null ; ?>>Tehnik Mesin</option>
                                <option value="Tehnik Listrik" <?= $prodi == 'Tehnik Listrik' ? 'selected' : null ; ?>>Tehnik Listrik</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                            <select type="text" class="form-control" id="jk" name="jk" required>
                                <!-- <option value="">-- pilih jenis kelamin --</option> -->
                                <?php $prodi = $mahasiswa['jk']; ?>
                                <option value="Laki-laki" <?= $prodi == 'Laki-laki' ? 'selected' : null ; ?>>Laki-laki</option>
                                <option value="perempuan" <?= $prodi == 'perempuan' ? 'selected' : null ; ?>>perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="number" class="form-control" id="telepon" name="telepon" placeholder="telepon...." required value="<?= $mahasiswa['telepon']; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" ><?= $mahasiswa['alamat']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email...." required value="<?= $mahasiswa['email']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="foto...." value="<?= $mahasiswa['foto']; ?>" onchange="previewImg()">

                        <!-- <p>
                            <small>Gambar Sebelumnya</small>
                        </p>
                        <img src="assets/img/<?= $mahasiswa['foto']; ?>" style="max-width:40px" alt="foto"> -->
                        <img src="assets/img/<?= $mahasiswa['foto']; ?>" class="img-thumbnail img-preview mt-2" width="100px" alt="foto">
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