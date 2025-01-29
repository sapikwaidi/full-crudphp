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

$title='Dashboard';

include("layout/header.php");

$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");
?>

        <!-- container -->
        <div class="container mt-5">
            <h1>Data Permohonan Analisa</h1>
            <hr>
            <a href="tambah-barang.php" class="btn btn-primary mb-1 btn-sm">Tambah</a>

            <table class="table table-bordered table-striped mt-3" id="table">
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
        <!-- akhir container -->

<?php
    include("layout/footer.php");
?>

