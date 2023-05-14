<?php 
require_once '../dbpet.php';
?>

<?php
    // Mendapatkan nilai id dari parameter GET
    $_id = $_GET['id'];

    // Membuat query SQL untuk mengambil data produk dengan id tertentu
    $sql = "SELECT * FROM restock WHERE id=?";
    $st = $dbh->prepare($sql);

    // Menjalankan query dengan parameter id yang telah didapatkan sebelumnya
    $st->execute([$_id]);

    // Mengambil hasil query dan menyimpannya ke dalam variabel $row
    $row = $st->fetch();
?>

<!-- Menampilkan data produk dalam bentuk tabel -->
<table class="table table-striped">
    <tbody>
        <tr>
            <td>ID</td>
            <td><?=$row['id']?></td>
        </tr>
        <tr>
            <td>Kode</td>
            <td><?=$row['kode']?></td>
        </tr>
        <tr>
            <td>Restock Number</td>
            <td><?=$row['restock_number']?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><?=$row['date']?></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><?=$row['qty']?></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><?=$row['price']?></td>
        </tr>
        <tr>
            <td>Supplier id</td>
            <td><?=$row['supplier_id']?></td>
        </tr>
    </tbody>
</table>
