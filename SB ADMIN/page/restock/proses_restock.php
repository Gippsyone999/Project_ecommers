<?php 
// Include file koneksi database
require_once '../dbpet.php';

// Ambil data dari form
$_kode = $_POST['kode'];
$_restock_number = $_POST['restok_number'];
$_date = $_POST['date'];
$_qty = $_POST['qty'];
$_price = $_POST['price'];
$_supplier_id = $_POST['supplier_id'];

$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[]=$_kode;
$ar_data[]=$_restock_number;
$ar_data[]=$_date;
$ar_data[]=$_qty;
$ar_data[]= 1.2 * $_price;
$ar_data[]=$_supplier_id;

// Cek aksi yang dilakukan: Simpan atau Update
if($_proses == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO restock (kode,restock_number,date,qty,price,
    supplier_) VALUES (?,?,?,?,?,?)";
}else if($_proses == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE restock SET kode=?,restock_number=?,date=?,qty=?,
    price=?,supplier_id=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:list_restock.php');
?>
