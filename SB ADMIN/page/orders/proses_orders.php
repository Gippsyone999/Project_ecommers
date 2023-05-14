<?php 
// Include file koneksi database
require_once '../dbpet.php';

// Ambil data dari form
$_tanggal = $_POST['orders_number'];
$_nomor = $_POST['date'];
$_produk_id = $_POST['qty'];
$_jumlah = $_POST['total_price'];
$_harga = $_POST['customer_id'];
$_vendor_id = $_POST['product_id'];

$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[]=$_orders_number;
$ar_data[]=$_date;
$ar_data[]=$_qty;
$ar_data[]=$_total_price;
$ar_data[]=$_customer_id;
$ar_data[]=$_product_id;

// Cek aksi yang dilakukan: Simpan atau Update
if($_proses == "Simpan"){
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO Pembelian (orders_number,date,qty,total_price,customer_id,product_id) VALUES (?,?,?,?,?,?)";
}else if($_proses == "Update"){
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[]=$_POST['id'];
    $sql = "UPDATE Pembelian SET orders_number=?,date=?,qty=?,total_price=?,customer_id=?,product_id=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:list_orders.php');
?>
