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
require_once 'koneksi.php';
require_once 'header.php';
?>

<div class="container mt-5">
	<h4>Laporan Transaksi</h4>
	<br>

	<a href="index1.php">
		<button class="btn btn-success btn-sm">
			Transaksi
		</button>
	</a>

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
						<a class="btn btn-outline-warning" href="detail_order.php?id_order=<?= $dt['id_order']; ?>">Detail Order</a>
						<a class="btn btn-info" href="laporan.php?id_order=<?= $dt['id_order']; ?>"><?= $dt['status']; ?></a>
					</td>
				</tr>

			<?php endwhile; ?>

		</tbody>
	</table>
</div>

<?php require_once 'footer.php'; ?>