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

        <!-- container -->
        <div class="container mt-5">
            <h1>Data LP</h1>
            <hr>
            <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i>Tambah</a>
            
            <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i>Download</a>

            <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i>Download</a>

            <table class="table table-bordered table-striped mt-3" id="table">
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
        <!-- akhir container -->
<?php
    include 'layout/footer.php';
?>