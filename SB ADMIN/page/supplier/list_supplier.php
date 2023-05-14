<?php 
    // include database connection
    require_once '../dbkoneksi.php';
?>

<?php 
    // select all data from table "produk"
    $sql = "SELECT * FROM supplier";
    // execute the query
    $rs = $dbh->query($sql);
?>

<a class="btn btn-success" href="form_supplier.php" role="button">Create Produk</a>

<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Contact Name</th>
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
            <td><?=$row['name']?></td>
            <td><?=$row['phone']?></td>
            <td><?=$row['address']?></td>
            <td><?=$row['contact_name']?></td>
            <td>
                <!-- buttons to view, edit, and delete a product -->
                <a class="btn btn-primary" href="view_supplier.php?id=<?=$row['id']?>">View</a>
                <a class="btn btn-primary" href="form_supplier.php?id=<?=$row['id']?>">Edit</a>
                <a class="btn btn-primary" href="delete_supplier.php?id=<?=$row['id']?>"
                onclick="if(!confirm('Anda Yakin Hapus Data Produk <?=$row['nama']?>?')) {return false}"
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
