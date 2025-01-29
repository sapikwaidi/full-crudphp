<?php
// render page be json
header('Content-Type: application/json');

require '../config/app.php';

// receive input
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

// validation input data not empty
if($nama==null){
    echo json_encode(['pessan' => 'Stuff don\'t empty!']);
    exit;
}

// query to add data
$query = "INSERT INTO barang VALUES(null,'$nama','$jumlah','$harga',CURRENT_TIMESTAMP())";
mysqli_query($db,$query);

// check status;
if($query){
    echo json_encode(['pessan' => 'Data barang succsess add to database']);
}else{
    echo json_encode(['pessan' => 'Data barang field add to database']);
}
?>