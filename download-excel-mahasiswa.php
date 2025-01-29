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

require 'config/app.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A2', 'No');
$activeWorksheet->setCellValue('B2', 'Nama');
$activeWorksheet->setCellValue('C2', 'Program Studi');
$activeWorksheet->setCellValue('D2', 'Jenis Kelamin');
$activeWorksheet->setCellValue('E2', 'Telepon');
$activeWorksheet->setCellValue('F2', 'Email');
$activeWorksheet->setCellValue('G2', 'Foto');

$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");

$no = 1;
$start = 3;

foreach($data_mahasiswa as $mahasiswa){
    $activeWorksheet->setCellValue('A'.$start, $no++)->getColumnDimension('A')->setAutoSize(true);
    $activeWorksheet->setCellValue('B'.$start, $mahasiswa['nama'])->getColumnDimension('B')->setAutoSize(true);
    $activeWorksheet->setCellValue('C'.$start, $mahasiswa['prodi'])->getColumnDimension('C')->setAutoSize(true);
    $activeWorksheet->setCellValue('D'.$start, $mahasiswa['jk'])->getColumnDimension('D')->setAutoSize(true);
    $activeWorksheet->setCellValue('E'.$start, $mahasiswa['telepon'])->getColumnDimension('E')->setAutoSize(true);
    $activeWorksheet->setCellValue('F'.$start, $mahasiswa['email'])->getColumnDimension('F')->setAutoSize(true);
    $activeWorksheet->setCellValue('G'.$start, 'http://localhost/dcs/assets/img/'.$mahasiswa['foto'])->getColumnDimension('G')->setAutoSize(true);

    $start++;
}

// table border:
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            // 'color' => ['argb' => 'FFFF0000'],
        ],
    ],
];

$border = $start-1;

$activeWorksheet->getStyle('A2:G'.$border)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
header('Content-Type: applcation/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="hello world.xlsx"');
readfile('hello world.xlsx');
unlink('hello world.xlsx');
exit;