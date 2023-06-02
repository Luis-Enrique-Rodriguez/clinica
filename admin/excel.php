<?php
include_once(__DIR__."/controllers/sistema.php");
include_once(__DIR__."/controllers/cita.php");
include_once(__DIR__."/controllers/paciente.php");
include_once(__DIR__."/controllers/historial.php");
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A1', $data);
$activeWorksheet->setCellValue('A2','');

$writer = new Xlsx($spreadsheet);
$writer->save('citas.xlsx');
/*
$spreadsheet2 = new Spreadsheet();
$activeWorksheet = $spreadsheet2->getActiveSheet();
$activeWorksheet->setCellValue('A1', $paciente);
$activeWorksheet->setCellValue('A2','This is my first Excel');
$writer2 = new Xlsx($spreadsheet2);
$writer2->save('paciente.xlsx');

$spreadsheet3 = new Spreadsheet();
$activeWorksheet = $spreadsheet3->getActiveSheet();
$activeWorksheet->setCellValue('A1', $historial);
$activeWorksheet->setCellValue('A2','This is my first Excel');
$writer3 = new Xlsx($spreadsheet3);
$writer3->save('historial.xlsx');*/
?>