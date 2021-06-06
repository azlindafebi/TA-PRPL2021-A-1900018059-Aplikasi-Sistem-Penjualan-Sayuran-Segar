<?php
include 'koneksi.php'; //untuk koneksi ke database
?>
<!DOCTYPE html>
<html>

<head>
    <title>FORM LOGIN </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<center><div class='alert alert-success fade in' style='width:400px; margin-top:30px;'>
            <a href='index.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Username dan Password tidak sesuai !</strong></center>
           </div>";
        }
    }
    ?>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-warning">
                        <!-- judul aplikasi -->
                        <div class="panel-heading">
                            <div style="margin-top: 5px;margin-bottom: 100px;"></div>
                            <div style="margin-left: 90px; margin-top: -90px; font-size: 120%;">
                                <img src="images/logo3.png">
                                <br>
                                A P L I K A S I &nbsp; W A R U N G &nbsp; S A Y U R A N
                            </div>
                            <div style="margin-left: 180px; font-size: 200%; margin-top: 10px;">
                                <strong>Form Login</strong>
                            </div>
                        </div>
                        <!-- end judul aplikasi -->

                        <!-- isi -->
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" action='cek_login.php'>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="username" class="form-control" placeholder="Masukan username Anda..." required maxlength="30">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Masukan password Anda..." required maxlength="30">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="login" class="btn btn-warning btn-block btn-lg" value="LOGIN">
                                    </div>
                                </form>

                                </form>
                            </div>
                        </div>
                        <!-- end isi -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>