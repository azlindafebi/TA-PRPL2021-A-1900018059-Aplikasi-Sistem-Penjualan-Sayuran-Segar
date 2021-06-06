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
// Create database connection using config file
include_once("koneksi.php");
// Fetch all users data from database
?>
<!--<ul class="nav nav-pills">
	<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
	</li>

</ul>-->
<form action="" method="get">
	<br>
	&nbsp&nbsp<input type="text" name="cari">
	<input type="submit" value="Cari">
	<form action="" method="get">
		<br>

	</form>

	<?php
	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		echo "<b>&nbsp Hasil Pencarian : " . $cari . "</b>";
	}
	?>
	<center>
		<h2>Data Transaksi Warung Sayuran<h2>
	</center>


	<?php
	require_once 'koneksi.php';
	require_once 'header.php';
	?>

	<div class="container mt-5">



		<table class="table table-bordered mt-3">
			<thead align="center" style="background-color: 	#FFFACD;">
				<tr>
					<th>#</th>
					<th>Tgl. Transaksi</th>
					<th>Total Item</th>
					<th>Total Bayar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody align="center">

				<?php
				$query = mysqli_query($conn, "SELECT * FROM tb_order");
				$no = 1;
				while ($dt = $query->fetch_assoc()) :
				?>

					<tr>
						<td><?= $no++; ?></td>
						<td><?= $dt['tgl_transaksi']; ?></td>
						<td><?= $dt['total_item']; ?></td>
						<td><?= $dt['total_bayar']; ?></td>
						<td>
							<a class="btn btn-outline-warning" href="status.php?id_order=<?= $dt['id_order']; ?>">Detail Order</a>
							<a class="btn btn-danger" href="delet_transaksi.php?id_order=<?= $dt['id_order']; ?>">Delete</a>
							<a class="btn btn-info" href="konfir_transaksi.php?id_order=<?= $dt['id_order']; ?>">Konfirmasi</a>
						</td>
					</tr>

				<?php endwhile; ?>

			</tbody>
		</table>
	</div>

	<?php require_once 'footer.php'; ?>
	</table>
	</body>

	</html>