<?php 
require_once '../dbpet.php';
?>

<?php
    // Mendapatkan nilai id dari parameter GET
    $_id = $_GET['id'];

    // Membuat query SQL untuk mengambil data produk dengan id tertentu
    $sql = "SELECT * FROM orders WHERE id=?";
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
            <td>ORDERS NUMBER</td>
            <td><?=$row['orders_number']?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><?=$row['date']?></td>
        </tr>
        <tr>
            <td>Qty</td>
            <td><?=$row['qty']?></td>
        </tr>
        <tr>
            <td>Total Price</td>
            <td><?=$row['total_price']?></td>
        </tr>
        <tr>
            <td>Customer</td>
            <td><?=$row['customer_id']?></td>
        </tr>
        <tr>
            <td>Product</td>
            <td><?=$row['product_id']?></td>
        </tr>
    </tbody>
</table>
