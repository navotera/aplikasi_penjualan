<?php
//initiate the session
session_start();

/**
 * *contoh data
 *trx_id: 
 *trx_detail_id: 
 *barang_id: 1
 *pemasok: UFO Elektronik
 *harga: 200.001
 *jumlah: 2
 *total: 400.000
 */

$post = (object) $_POST;


require_once  '../orm/TransaksiDetailORM.php';


$isExist = (isset($post->trx_detail_id)) ? TransaksiDetailORM::where('id', $post->trx_detail_id)->findOne() : false;

$trx_detail = ($isExist) ?: TransaksiDetailORM::create();

$trx_detail->user_id = $_SESSION['UserID'];
$trx_detail->time = $post->time;
$trx_detail->barang_id = $post->barang_id;
$trx_detail->harga = str_replace(".", "", $post->harga);
$trx_detail->qty = $post->jumlah;
$trx_detail->total = str_replace(".", "", $post->total);

$trx_detail->save();
