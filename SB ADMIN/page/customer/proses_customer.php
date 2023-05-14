<?php
require_once '../dbpet.php';
?>
<?php
$_nama = $_POST['name'];
$_jk = $_POST['gender'];
$_tmp_lahir = $_POST['phone'];
$_tgl_lahir = $_POST['email'];
$_email = $_POST['addres'];
$_kartu_id = $_POST['card_id'];

$_proses = $_POST['proses'];

// array data
$ar_data[] = $_name; // ? 1
$ar_data[] = $_gender; // 2
$ar_data[] = $_phone;
$ar_data[] = $_email;
$ar_data[] = $_addres;
$ar_data[] = $_card_id; // ? 6

if ($_proses == "Simpan") {
    // data baru
    $sql = "INSERT INTO customer (kode,name,gender,phone,email,
    addres,kartu_id) VALUES (?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit']; // ? 8
    $sql = "UPDATE customer SET kode=?,name=?,gender=?,phone=?,
    email=?,addres=?,kartu_id=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:list_customer.php');
?>