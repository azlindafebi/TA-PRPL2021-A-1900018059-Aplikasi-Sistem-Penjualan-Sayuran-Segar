<nav class="navbar navbar-expand-md navbar-light" style="background-color: 		#ADD8E6;">
  <a href="#" class="navbar-brand"><img src="images/logo3.png" style="height: 80px; width:100px; margin-left:50px;"> </a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

  </div>
  <form class="form-inline" style="margin-right: 50px;">
    <div class="navbar-nav">
      <a href="index1.php" class="nav-item nav-link active">Home</a>
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
    <a href="index.php" class="btn btn-outline-info">Login</a>
  </div>
  </div>
</nav>
<!-- end navbar -->
<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'db_akhir');

if (!$conn) {
  die("Koneksi gagal. " . mysqli_connect_error()); // close koneksi
}

if (!isset($_GET['cari'])) {
  $query = mysqli_query($conn, "SELECT * FROM tb_produk");
} else {
  $query = mysqli_query($conn, "SELECT * FROM tb_produk WHERE nama_produk LIKE '%" . $_GET['cari'] . "%'");
}

require_once 'header.php';

if (isset($_SESSION['pesan'])) {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              ' . $_SESSION['pesan'] . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>';

  unset($_SESSION['pesan']);
}
?>

<div class="container mt-5">

  <?php require_once 'cart.php'; ?>

  <div class="row mb-2">
    <div class="col">
      <h4>Daftar Produk</h4>
    </div>
    <div class="col">
      <form class="form-inline pull-right" action="" method="GET">
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" name="cari" class="form-control" placeholder="Cari Produk">
        </div>
        <button type="submit" class="btn btn-success mb-2">Cari</button>
      </form>
    </div>
  </div>

  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Gambar</th>
        <th scope="col">Stok</th>
        <th scope="col">Pembelian</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $no = 1;
      while ($dt = $query->fetch_assoc()) :
      ?>

        <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
          <input type="hidden" name="id_produk" value="<?= $dt['id']; ?>"></input>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $dt['nama_barang']; ?></td>
            <td><img style="height: 80px; width:80px;" src="<?= 'images/'.$dt['gambar'] ;   ?>"></td>
            <td><?= $dt['harga']; ?></td>
            <td><?= $dt['stok']; ?></td>
            <td width="106">
              <input class="form-control form-control-sm" type="number" name="pembelian" value="0" min="1" max="<?= $dt['stok']; ?>"></td>
            <td>
              <button class="btn btn-primary btn-sm" type="submit" name="submit">
                <i class="fa fa-shopping-cart"></i>
              </button>
            </td>
          </tr>
        </form>

      <?php endwhile; ?>

    </tbody>
  </table>

  <a href="laporan.php"><button class="btn btn-danger">Lihat Laporan</button></a>
</div>

<?php require_once 'footer.php'; ?>







<!-- <?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'db_akhir');

if (!$conn) {
  die("Koneksi gagal. " . mysqli_connect_error()); // close koneksi
}

if (!isset($_GET['cari'])) {
  $query = mysqli_query($conn, "SELECT * FROM tb_produk");
} else {
  $query = mysqli_query($conn, "SELECT * FROM tb_produk WHERE nama_produk LIKE '%" . $_GET['cari'] . "%'");
}

require_once 'header.php';

if (isset($_SESSION['pesan'])) {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              ' . $_SESSION['pesan'] . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>';

  unset($_SESSION['pesan']);
}
?> <div class="container mt-5">

  <?php require_once 'cart.php'; ?>

  <div class="row mb-2">
    <div class="col">
      <h4>Daftar Produk</h4>
    </div>
    <div class="col">
      <form class="form-inline pull-right" action="" method="GET">
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" name="cari" class="form-control" placeholder="Cari Produk">
        </div>
        <button type="submit" class="btn btn-success mb-2">Cari</button>
      </form>
    </div>
  </div>

  <table class="table">
    <thead style="background-color: 	#FFFACD;">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Gambar</th>
        <th scope="col">Stok</th>
        <th scope="col">Pembelian</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $no = 1;
      while ($dt = $query->fetch_assoc()) :
      ?>

        <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
          <input type="hidden" name="id_produk" value="<?= $dt['id']; ?>"></input>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $dt['nama_barang']; ?></td>
            <td><img style="height: 80px; width:80px;" src="<?= 'images/'.$dt['gambar'] ;   ?>"></td>
            <td><?= $dt['harga']; ?></td>
            <td><?= $dt['stok']; ?></td>
            <td width="106">
              <input class="form-control form-control-sm" type="number" name="pembelian" value="0" min="1" max="<?= $dt['stok']; ?>">
            </td>
            <td>
              <button class="btn btn-primary btn-sm" type="submit" name="submit">
                <i class="fa fa-shopping-cart"></i>
              </button>
            </td>
          </tr>
        </form>

      <?php endwhile; ?>

    </tbody>
  </table>

  <a href="laporan.php"><button class="btn btn-success">Lihat Laporan</button></a>
</div>

<?php include 'footer.php'; ?> -->