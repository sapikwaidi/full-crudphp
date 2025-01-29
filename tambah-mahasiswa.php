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
    $title='Tambah Mahasiswa';

    include "layout/header.php";

    if(isset($_POST['tambah'])){
        if(create_mahasiswa($_POST) > 0){
            echo "<script>
                    alert('Data Berhasil di Tambahkan');
                    document.location.href='mahasiswa.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data Berhasil di Tambahkan');
                    document.location.href='mahasiswa.php';
                </script>";
        }
    }

?>
        <!-- container -->
        <div class="container mt-5">
            <h1>Add Data</h1>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama mahasiswa...." required>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="nama" class="form-label">Program Studi</label>
                        <select type="text" class="form-control" id="prodi" name="prodi" required>
                            <option value="">-- pilih prodi --</option>
                            <option value="Tehnik Informatika">Tehnik Informatika</option>
                            <option value="Tehnik Mesin">Tehnik Mesin</option>
                            <option value="Tehnik Listrik">Tehnik Listrik</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select type="text" class="form-control" id="jk" name="jk" required>
                            <option value="">-- pilih jenis kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" placeholder="telepon...." required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat"></textarea>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email...." required>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="foto...." required onchange="previewImg()">

                    <img src="" class="img-thumbnail img-preview mt-2" width="100px">
                </div>

                <button type="submit" name="tambah" class="btn btn-primary" style="float: right">Tambah</button>
            </form> 
        </div>
        <!-- akhir container -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

        <!-- my script -->
        <!-- preview image -->
        <script>
            function previewImg(){
                const foto = document. querySelector('#foto');
                const imgPreview = document.querySelector('.img-preview');
                
                const fileFoto = new FileReader();
                fileFoto.readAsDataURL(foto.files[0]);
                // console.log(imgPreview);
                
                fileFoto.onload = function(e){
                    imgPreview.src = e.target.result;
                    // console.log('ok');
                }
            }
        </script>
        

    <?php
        include 'layout/footer.php';
    ?>
    </body>
</html>
