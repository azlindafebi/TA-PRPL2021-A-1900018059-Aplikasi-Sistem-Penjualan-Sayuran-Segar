<?php
// include database connection file
include_once("koneksi.php");
// Get id from URL to delete that user
$id_order = $_GET['id_order'];
// Delete user row from table based on given id
$result = mysqli_query($conn, "UPDATE tb_order SET status='confirmed' WHERE id_order='$id_order'");
// After delete redirect to Home, so that latest user list will be displayed.
echo "<script>alert('Pesanan telah terkonfirmasi');window.location='profil.php';</script>";
