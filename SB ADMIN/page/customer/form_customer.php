<?php
require_once '../dbpet.php';
?>

<form method="POST" action="proses_pelanggan.php">
    <div class="form-group row">
        <label for="nama" class="col-4 col-form-label">Nama Pelanggan</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-adjust"></i>
                    </div>
                </div>
                <input id="name" name="nama" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="harga_beli" class="col-4 col-form-label">Jenis Kelamin</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-arrow-circle-o-left"></i>
                    </div>
                </div>
                <input id="gender" name="gender" value="L" type="radio" class="form-control">Laki-laki
                <input id="gender" name="gender" value="P" type="radio" class="form-control">Perempuan
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="stok" class="col-4 col-form-label">Phone</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-arrow-circle-up"></i>
                    </div>
                </div>
                <input id="phone" name="phone" value="" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="min_stok" class="col-4 col-form-label">address</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-arrow-circle-right"></i>
                    </div>
                </div>
                <input id="addres" name="addres" value="" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="min_stok" class="col-4 col-form-label">Email</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-arrow-circle-right"></i>
                    </div>
                </div>
                <input id="email" name="email" value="" type="email" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="jenis" class="col-4 col-form-label">Kartu</label>
        <div class="col-8">
            <?php
            $sqljenis = "SELECT * FROM card";
            $rsjenis = $dbh->query($sqljenis);
            ?>
            <select id="card_id" name="card_id" class="custom-select">
                <?php
                foreach ($rsjenis as $rowjenis) {
                ?>
                    <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['nama'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <input type="submit" name="proses" type="submit" class="btn btn-primary" value="Simpan" />
        </div>
    </div>
</form>