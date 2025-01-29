<?php
// render page be json
header('Content-Type: application/json');

require '../config/app.php';

parse_str(file_get_contents('php://input'), $put);

// receive input
$id_barang = $put['id_barang'];
$nama = $put['nama'];
$jumlah = $put['jumlah'];
$harga = $put['harga'];

// validation input data not empty
if($nama==null){
    echo json_encode(['pessan' => 'Stuff don\'t empty!']);
    exit;
}

// query to add data
$query = "UPDATE barang SET nama='$nama',jumlah='$jumlah',harga='$harga' WHERE id_barang=$id_barang";
mysqli_query($db,$query);

// check status;
if($query){
    echo json_encode(['pessan' => 'Data barang succsess update to database']);
}else{
    echo json_encode(['pessan' => 'Data barang field update to database']);
}
?>