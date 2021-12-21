<?php
    // Memulai Session 
        session_start();
        $status = $_SESSION['status'];
        $id_rfid = $_SESSION['id_rfid'];
        
        if($_SESSION['status'] != "login"){
            header("location:index.php?page=login&pesan=belum_login");
        }

    $query_rfid = "SELECT * FROM tb_rfid WHERE id_rfid='$id_rfid'";
    $row = query($query_rfid)[0];  

    $query_user= "SELECT * FROM tb_user WHERE id_rfid='$id_rfid'";
    $row_user = query($query_user)[0];  


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
                        <h4 class="page-title">Halaman Profil</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                               
                            </ol>
                            <a href="logout.php"
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Logout</a>
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
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/view-lg.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="plugins/images/users/genu.jpg"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <h3 class="text-white mt-2"><?php echo $row['nama_lengkap']?></h3>
                                        <h4 class="text-white mt-2"><?php echo $row_user['email']?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box mt-5 d-md-flex">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <h1><?php echo $row['nomor_rfid']?></h1>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0 fw-bold">Nama Lengkap</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="form-control p-0 border-0"> <?php echo $row['nama_lengkap'];?> </label>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0 fw-bold">Alamat</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="form-control p-0 border-0"> <?php echo $row['alamat'];?> </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0 fw-bold">Telepon</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="form-control p-0 border-0"> <?php echo $row['telepon'];?> </label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0 fw-bold">Saldo</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="form-control p-0 border-0" ><?php echo rupiah($row['saldo']);?></label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0 fw-bold">Nama Tol</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <label class="form-control p-0 border-0"> <?php echo $row['nama_tol'];?> </label>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
</body>
</html>