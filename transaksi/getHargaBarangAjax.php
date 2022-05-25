<?php

require_once  '../orm/BarangORM.php';
require_once  '../orm/HargaBarangORM.php';
require_once  '../helper/function.php';

$barangID = $_GET['barangId'];


$harga_akhir = HargaBarangORM::order_by_desc('tanggal')->where('barang_id', $barangID)->limit(1)->findOne();
$barang = BarangORM::findOne();

$json['harga'] = format_uang($harga_akhir->harga);
$json['pemasok']  = $barang->pemasok;

echo json_encode($json);
