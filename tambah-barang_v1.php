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
    $title='Tambah Barang';

    include "layout/header.php";

    if(isset($_POST['tambah'])){
        if(create_barang($_POST) > 0){
            echo "<script>
                    alert('Data Berhasil di Tambahkan');
                    document.location.href='index.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data Berhasil di Tambahkan');
                    document.location.href='index.php';
                </script>";
        }
    }

?>
        <!-- container -->
        <div class="container mt-5">
            <h1>Add Data</h1>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">LP / LI`</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama barang...." required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Pangkat`</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah barang...." required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">NRP</label>
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="harga barang...." required>
                </div>

                <button type="submit" name="tambah" class="btn btn-primary" style="float: right">Tambah</button>
            </form> 
        </div>
        <!-- akhir container -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

<?php
    include 'layout/footer.php';
?>