<?php
  // Memulai Session 
  session_start();
  $status = $_SESSION['status'];
        
  if($_SESSION['status'] != "login"){
    header("location:index.php?page=login&pesan=belum_login");
  }
    
    $id_golongan = $_GET['id_golongan'];
    $id_tol = $_GET['id_tol'];
    $ambiltarif = $_GET['tarif'];
    //echo "Selamat datang di halaman Edit Tol dengan ID : $id_tol dan ID golongan : $id_golongan";
    $query_tol= "SELECT * FROM tb_tol WHERE id_tol='$id_tol'";
    $row_tol = query($query_tol)[0];
    $query_tarif= "SELECT * FROM tb_golongan WHERE id_golongan='$id_golongan'";
    $row_tarif = query($query_tarif)[0];
    // Memanggil data bayar pada tb_golongan
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
            <div class="col-lg-3 col-xlg-3 col-md-12">        
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-6 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="action-edit-tol.php?id_tol=<?php echo $id_tol;?>&id_golongan=<?php echo $id_golongan;?>" method="POST">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Nama Tol</label>
                                <div class="col-md-12 border-bottom p-0 fw-bold">
                                   <label class="form-control p-0 border-0" ><?php echo $row_tol['nama_tol'];?></label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0 fw-bold">Golongan</label>
                                <select id="nama_golongan" name="nama_golongan">
                                        <option value="golongan_1">Golongan I</option>
                                        <option value="golongan_2">Golongan II</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Tarif</label>
                                <div class="col-md-12 border-bottom p-0 fw-bold">
                                    <input type="text" name="tarif" class="form-control p-0 border-0" value="<?php echo $row_tarif['tarif'];?>"> 
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class>
                                    <!-- name mengacu pada array key, sedangkan value mengacu pada nilainya.-->
                                    <button class="btn btn-success" name="Submit" value="edit-tol">Edit</button>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class>
                                    <!-- name mengacu pada array key, sedangkan value mengacu pada nilainya.-->
                                    <button class="btn btn-danger" name="Submit" value="delete-tol">Delete</button>
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