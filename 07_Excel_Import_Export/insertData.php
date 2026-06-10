<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tempImg = $_FILES['profile']['tmp_name'];
    if(!is_dir('images')){
        mkdir('images', 0777, true);
    }
    $imgFile = $_FILES['profile']['name'];
    $targetFile = 'images/'.$imgFile;
    move_uploaded_file($tempImg, $targetFile);

    $excelfile = "users.xlsx";
    if(file_exists($excelfile)){
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelfile);
        $sheet = $spreadsheet->getActiveSheet();
    }else{
        $spreadsheet = new spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet-> fromArray(["user", "email", "profile"], NULL, 'A1');
    }

    $sheet-> fromArray([$username, $email, $imgFile], NULL, 'A'.($sheet->getHighestRow() + 1));

    $write = new Xlsx($spreadsheet);
    $write ->save($excelfile);
    header("Location: index.php");
}

?>