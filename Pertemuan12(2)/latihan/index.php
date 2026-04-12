<?php
require_once "app/produk/item.php";
include "app/service/item.php";

//Menggunakan alias untuk menghindari konflik nama
use App\Produk\Item as ProdukItem;
use App\Service\Item as ServiceItem;

//Membuat instance
$produk = new ProdukItem("Laptop");
$service = new ServiceItem("Perbaikan Dijalankan");

//Menampilkan hasil
echo $produk -> info() . "\n";
echo $service -> info();
?>