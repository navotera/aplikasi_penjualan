<?php

session_start();

//require_once '../helper/function.php';
require_once  '../orm/TransaksiORM.php';
require_once  '../orm/TransaksiDetailORM.php';

$post = (object) $_POST;


//inisiasi nilai awal dengan berasumsi bahwa bukan record baru
$isNewRecord = ($post->id === '') ? true : false;

$trx = ($isNewRecord) ? TransaksiORM::create() : TransaksiORM::findOne($post->id);
$trx->tanggal = date("Y-m-d", strtotime($post->tanggal));
$trx->kode = $post->kode;
$trx->pelanggan_id = $post->pelanggan_id;
$trx->user_id = $_SESSION['UserID'];
$trx->save();


if ($isNewRecord) {

    //cari transaksi detail yang masih berstatus temporary 
    $trx_detail = TransaksiDetailORM::where('time', $post->time)->where('user_id', $post->user_id)->findMany();

    foreach ($trx_detail as $item) {
        $item->transaksi_id = $trx->id;
        $item->status_temporary = 0;
        $item->save();
    }
}

//?page=transaksi/form&time=1628123812&userID=1

$url = app_path() . '?page=transaksi/print' . '&id=' . $trx->id;;
header('Location:' . $url);
