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

    // only user  as operator pegawai
    if($_SESSION["level"] != 1 and $_SESSION["level"] != 3){
        echo "<script>
                    alert('sory you have not access!');
                    document.location.href='crud-modal.php';
        </script>";

        exit;
    }

    $title='Data pegawai';
    
    include 'layout/header.php';
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pegawai</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Data Pegawai</li>
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
                                            <h3 class="card-title">Table Data Pegawai</h3>
                                        </div>

                                        <!-- content replace -->
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            
                                            <!-- <table id="example2" class="table table-bordered table-hover"> -->
                                            <table id="" class="table table-bordered table-striped">
                                                <thead>
                                                    <th class="text-center">No.</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Email</th> 
                                                    <th>Telepon</th>
                                                    <th>Alamat</th>
                                                </thead>
                                                <tbody id="live_data">
                                                    
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

<script>
    $('document').ready(function(){
        setInterval(function(){
            getPegawai()
        }, 200)
    });

    function getPegawai(){
        $.ajax({
            url : "realtime-pegawai.php",
            type : "GET",
            success : function(response){
                $('#live_data').html(response)
            }
        });
    }
</script>
    
<?php
    include("layout/footer.php");
?>