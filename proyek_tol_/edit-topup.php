<?php
  // Memulai Session 
  session_start();
  $status = $_SESSION['status'];
        
  if($_SESSION['status'] != "login"){
    header("location:index.php?page=login&pesan=belum_login");
  }
    $id_rfid = $_GET['id_rfid'];
    $query_rfid = "SELECT * FROM tb_rfid WHERE id_rfid='$id_rfid'";
    $row = query($query_rfid)[0];    
    
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
                <h4 class="page-title">Halaman Topup</h4>
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
            <div class="col-lg-3 col-xlg-3 col-md-12">        
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-6 col-xlg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="action-edit-topup.php?id_rfid=<?php echo $id_rfid;?>" method="POST">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0 fw-bold">Nomor RFID</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <label class="form-control p-0 border-0"><?php echo $row['nomor_rfid'];?></label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0 fw-bold">Nominal</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" name="nominal" placeholder="Masukkan Jumlah Nominal" class="form-control p-0 border-0" required> 
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <!-- name mengacu pada array key, sedangkan value mengacu pada nilainya.-->
                                    <button class="btn btn-success" name="Submit" value="edit-topup">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-3 col-xlg-3 col-md-12">        
            </div>
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