<?php
// render page be json
header('Content-Type: application/json');

require '../config/app.php';

parse_str(file_get_contents('php://input'), $delete);

// receive input
$id_barang = $delete['id_barang'];

// query to add data
$query = "DELETE FROM barang  WHERE id_barang=$id_barang";
mysqli_query($db,$query);

// check status;
if($query){
    echo json_encode(['pessan' => 'Data barang succsess delete to database']);
}else{
    echo json_encode(['pessan' => 'Data barang field delete to database']);
}
?>