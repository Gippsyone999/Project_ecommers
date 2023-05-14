<?php 
    // include database connection
    require_once '../dbpet.php';
?>

<?php 
    // select all data from table "produk"
    $sql = "SELECT * FROM product";
    // execute the query
    $rs = $dbh->query($sql);
?>

<a class="btn btn-success" href="form_product.php" role="button">Create Produk</a>

<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <th>No</th><th>Kode</th><th>Nama</th>
            <th>Harga Jual</th><th>Qty</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            // initialize counter
            $nomor = 1;
            // loop through the result set
            foreach($rs as $row) {
        ?>
        <tr>
            <td><?=$nomor?></td>
            <td><?=$row['kode']?></td>
            <td><?=$row['nama']?></td>
            <td>
                <!-- buttons to view, edit, and delete a product -->
                <a class="btn btn-primary" href="view_product_type.php?id=<?=$row['id']?>">View</a>
                <a class="btn btn-primary" href="form_product_type.php?id=<?=$row['id']?>">Edit</a>
                <a class="btn btn-primary" href="delete_product_type.php?id=<?=$row['id']?>"
                onclick="if(!confirm('Anda Yakin Hapus Data Produk <?=$row['nama']?>?')) {return false}"
                >Delete</a>
            </td>
        </tr>
        <?php 
            // increment counter
            $nomor++;   
            } 
        ?>
    </tbody>
</table>
