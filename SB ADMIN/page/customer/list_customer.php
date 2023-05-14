<?php
 // include database connection
require_once '../dbpet.php';
?>

<?php
    // select all data from table "kartu"
    $sql = "SELECT * FROM customer";
    // execute the query
    $rs = $dbh->query($sql);
?>

<a class="btn btn-success" href="form_customer.php" role="button">Create Pelanggan</a>

<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Addres</th>
            <th>Card</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // initialize counter
        $nomor  = 1;
        // loop through the result set
        foreach ($rs as $row) {
        ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['card_id'] ?></td>
                <td>
                    <a class="btn btn-primary" href="view_produk.php?id=<?= $row['id'] ?>">View</a>
                    <a class="btn btn-primary" href="form_produk.php?idedit=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-primary" href="delete_produk.php?iddel=<?= $row['id'] ?>" onclick="if(!confirm('Anda Yakin Hapus Data Produk <?= $row['nama'] ?>?')) {return false}">Delete</a>
                </td>
            </tr>
        <?php
            $nomor++;
        }
        ?>
    </tbody>
</table>