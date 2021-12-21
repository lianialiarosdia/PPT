<?php
  // Memulai Session 
  session_start();
  $status = $_SESSION['status'];
        
  if($_SESSION['status'] != "login"){
    header("location:index.php?page=login&pesan=belum_login");
  }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        // Mengambil data dari URL dan menampilkan peringatan
        if($_GET['pesan'] == "username_user"){
            echo "<script type='text/javascript'>alert('Username Anda sudah pernah digunakan!');</script>";
        }
        elseif($_GET['pesan'] == "rfid_user"){
            echo "<script type='text/javascript'>alert('ID yang terhubung dengan Nomor RFID dan Nama Lengkap Anda sudah pernah didaftarkan!');</script>";
        }
        
    ?>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Tambah User</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex position-relative">
                    
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
           
           
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-6 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="action-edit-user.php" method="POST">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Nama Lengkap</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap" class="form-control p-0 border-0" required> 
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Nomor RFID</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="nomor_rfid" placeholder="Masukkan nomor RFID" class="form-control p-0 border-0" required> 
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Username</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="username" placeholder="Masukkan username" class="form-control p-0 border-0" required> 
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Email</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="email" name="email" placeholder="Masukkan email" class="form-control p-0 border-0" name="example-email" id="example-email" required>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Password</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="password" name="password" placeholder="Masukkan password" class="form-control p-0 border-0" required>
                                </div>
                            </div>
                            
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <!-- name mengacu pada array key, sedangkan value mengacu pada nilainya.-->
                                    <button class="btn btn-success" name="Submit" value="create-user">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</body>
</html>