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

    include 'layout/header.php';


    // pick id_mahasiswa
    $id_mahasiswa=(int)$_GET['id_mahasiswa'];

    // show data masiswa
    $mahasiswa=select("SELECT * FROM  mahasiswa WHERE id_mahasiswa=$id_mahasiswa")[0];
?>

        <!-- container -->
        <div class="container mt-5">
            <h1>Detail <?= $mahasiswa['nama']; ?></h1>
            <hr>

            <table class="table table-bordered table-striped mt-3">
                <tr>
                    <td>Nama</td>
                    <td><?= $mahasiswa['nama']; ?></td>
                </tr>
                <tr>
                    <td>Program studi</td>
                    <td><?= $mahasiswa['prodi']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?= $mahasiswa['jk']; ?></td>
                </tr>
                <tr>
                    <td>Telephon</td>
                    <td><?= $mahasiswa['telepon']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $mahasiswa['alamat']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $mahasiswa['email']; ?></td>
                </tr>
                <tr>
                    <td width="50%">Foto</td>
                    <td>
                        <a href="assets/img/<?= $mahasiswa['foto']; ?>">
                            <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto" width="50%">
                        </a>
                    </td>
                </tr>
            </table>
            <a href="mahasiswa.php" class="btn btn-secondary btn-small" style="float:right">Kembali</a>
        </div>
        <!-- akhir container -->
<?php
    include 'layout/footer.php';
?>