<nav class="navbar navbar-expand-md navbar-light" style="background-color: 		#ADD8E6;">
    <a href="#" class="navbar-brand"><img src="images/logo3.png" style="height: 80px; width:100px; margin-left:50px;"> </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

    </div>
    <form class="form-inline" style="margin-right: 50px;">
        <div class="navbar-nav">
            <a href="admin.php" class="nav-item nav-link active">home</a>
            <a href="profil.php" class="nav-item nav-link active">transaksi</a>
            <!--<a href="#" class="nav-item nav-link">Transaksi</a>-->
            <!--<div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Messages</a>
        <div class="dropdown-menu">
          <a href="#" class="dropdown-item">Inbox</a>
          <a href="#" class="dropdown-item">Sent</a>
          <a href="#" class="dropdown-item">Drafts</a>
        </div>
      </div>-->
    </form>
    <div class="navbar-nav">
        <a href="logout.php" class="btn btn-outline-info">keluar</a>
    </div>
    </div>
</nav>
<!-- end navbar -->
<br><br><br>
<?php
require_once 'koneksi.php';
require_once 'header.php';

if (!isset($_GET['id_order'])) {
    header('Location: profil.php');
}

?>

<div class="container mt-5">
    <h4>Detail Order</h4>
    <br>

    <a href="profil.php">
        <button class="btn btn-success btn-sm">
            <i class="fa fa-arrow-left"></i> Kembali
        </button>
    </a>

    <table class="table table-bordered mt-3">
        <thead align="center">
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Pembelian</th>


            </tr>
        </thead>
        <tbody>

            <?php
            $query = mysqli_query($conn, "SELECT * FROM `tb_detail_order` INNER JOIN tb_produk ON tb_detail_order.id_produk = tb_produk.id WHERE id_order = '$_GET[id_order]'");
            $no = 1;

            while ($detail = $query->fetch_assoc()) :
            ?>

                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $detail['nama_barang']; ?></td>
                    <td><?= $detail['harga']; ?></td>
                    <td align="center"><?= $detail['pembelian']; ?></td>



                    </td>

                </tr>

            <?php endwhile; ?>

        </tbody>
    </table>
</div>