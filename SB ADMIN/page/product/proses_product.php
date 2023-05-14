<?php 
// Include file koneksi database
require_once '../dbpet.php';

// Ambil data dari form
$_kode = $_POST['kode'];
$_nama = $_POST['nama'];
$_pembelian = $_POST['purchase_price'];
$_harga = $_POST['sell_price'];
$_stok = $_POST['stok'];

$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[]=$_kode;
$ar_data[]=$_nama;
$ar_data[]=$_purchase_price;
$ar_data[]=$_sell_price;
$ar_data[]= 1.2 * $_harga;
$ar_data[]=$_stok;


// Cek aksi yang dilakukan: Simpan atau Update
if($_proses == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO product (kode,nama,purchase_price,sell_price,stok,
    min_stok,product_type_id,restock_id) VALUES (?,?,?,?,?,?,?,?)";
}else if($_proses == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE produk SET kode=?,nama=?,purchase_price=?,sell_price=?,
    stok=?,min_stok=?,product_type_id=?,restock_id WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:list_product.php');
?>
