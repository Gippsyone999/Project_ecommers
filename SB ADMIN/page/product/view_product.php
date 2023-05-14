<?php 
require_once '../dbpet.php';
?>

<?php
    // Mendapatkan nilai id dari parameter GET
    $_id = $_GET['id'];

    // Membuat query SQL untuk mengambil data produk dengan id tertentu
    $sql = "SELECT * FROM product WHERE id=?";
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
            <td>Nama Produk</td>
            <td><?=$row['nama']?></td>
        </tr>
        <tr>
            <td>Harga Jual</td>
            <td><?=$row['purchase_price']?></td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td><?=$row['sell_price']?></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><?=$row['stok']?></td>
        </tr>
        <tr>
            <td>Minimum Stok</td>
            <td><?=$row['min_stok']?></td>
        </tr>
        <tr>
            <td>Jenis produk</td>
            <td><?=$row['product_type_id']?></td>
        </tr>
        <tr>
            <td>restock produk</td>
            <td><?=$row['restock_id']?></td>
    </tbody>
</table>
