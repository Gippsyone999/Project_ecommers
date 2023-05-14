<?php 
    // include database connection
    require_once '../dbkoneksi.php';
?>

<?php 
    // select all data from table "kartu"
    $sql = "SELECT * FROM orders";
    // execute the query
    $rs = $dbh->query($sql);
?>

<a class="btn btn-success" href="form_orders.php" role="button">Create Pembeli</a>

<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <th>id</th>
            <th>Orders Number</th>
            <th>Date</th>
            <th>Qty</th>
            <th>Total Price</th>
            <th>Customer Id</th>
            <th>Product Id</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            // initialize counter
            $id = 1;
            // loop through the result set
            foreach($rs as $row) {
        ?>
        <tr>
            <td><?=$id?></td>
            <td><?=$row['orders_number']?></td>
            <td><?=$row['date']?></td>
            <td><?=$row['qty']?></td>
            <td><?=$row['total_price']?></td>
            <td><?=$row['customer_id']?></td>
            <td><?=$row['product_id']?></td>
            <td>
                <!-- buttons to view, edit, and delete a product -->
                <a class="btn btn-primary" href="view_orders.php?id=<?=$row['id']?>">View</a>
                <a class="btn btn-primary" href="form_orders.php?id=<?=$row['id']?>">Edit</a>
                <a class="btn btn-primary" href="delet_orders.php?id=<?=$row['id']?>"
                onclick="if(!confirm('Anda Yakin Hapus Data Pembelian <?=$row['nomor']?>?')) {return false}"
                >Delete</a>
            </td>
        </tr>
        <?php 
            // increment counter
            $id++;   
            } 
        ?>
    </tbody>
</table>