<?php require_once './orm/TransaksiORM.php'; ?>

<div class="panel panel-default">
    <div class="panel-heading">
        Daftar Transaksi Terakhir
        <?php
        if (isset($_SESSION['message'])) {
            echo ' <div class="text-info pull-right notice">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        }
        ?>

    </div>
    <div class="panel-body">

        <a class="pull-right btn btn-primary" href="<?= app_path(); ?>?page=transaksi/form&time=<?= time(); ?>&userID=<?= $_SESSION['UserID']; ?>" role="button"><i class="fa fa-plus"></i> Tambah</a>

        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Jumlah Barang</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
</div>