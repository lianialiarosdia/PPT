<?php
  // Memulai Session 
  session_start();
  $status = $_SESSION['status'];
        
  if($_SESSION['status'] != "login"){
    header("location:index.php?page=login&pesan=belum_login");
  }

    $id_topup= $_GET['id_topup'];
    // echo "Selamat datang di halaman Edit Tol dengan ID : $id_tol dan ID golongan : $id_golongan";
    $query_topup= "SELECT * FROM tb_topup WHERE id_topup='$id_topup'";
    $row_topup = query($query_topup)[0];
    // echo "Selamat datang di halaman Status dengan ID : $id_topup";
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
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Edit Tol</h4>
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
                        <form class="form-horizontal form-material" action="action-edit-status.php?id_topup=<?php echo $id_topup;?>" method="POST">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0 fw-bold">Nomor Transaksi Top-Up</label>
                                   <label class="form-control p-0 border-0"><?php echo $row_topup['no_topup'];?></label>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0 fw-bold">Nominal Topup</label>
                                   <label class="form-control p-0 border-0"><?php echo $row_topup['nominal'];?></label>
                            </div>                           
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0 fw-bold">Status</label>
                                <select id="status" name="status">
                                        <option value="Tunggu">Tunggu</option>
                                        <option value="Berhasil">Berhasil</option>
                                        <option value="Gagal">Gagal</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <!-- name mengacu pada array key, sedangkan value mengacu pada nilainya.-->
                                    <button class="btn btn-success" name="Submit" value="edit-status">Edit</button>
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