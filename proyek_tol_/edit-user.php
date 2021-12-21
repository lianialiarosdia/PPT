<?php
  // Memulai Session 
  session_start();
  $status = $_SESSION['status'];
        
  if($_SESSION['status'] != "login"){
    header("location:index.php?page=login&pesan=belum_login");
  }
    $id_user = $_GET['id_user'];
    $query_user = "SELECT * FROM tb_user WHERE id_user='$id_user'";
    $row = query($query_user)[0];   
  
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
                <h4 class="page-title">Edit User</h4>
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
                        <form class="form-horizontal form-material" action="action-edit-user.php?id_user=<?php echo $id_user;?>" method="POST">
                            <div class="form-group mb-4 ">
                                <label class="col-md-12 p-0 fw-bold">Username</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="username" value="<?php echo $row['username'];?>" class="form-control p-0 border-0" required> 
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0 fw-bold">Email</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control p-0 border-0" required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 p-0 fw-bold">Level</label>
                                    <select id="level" name="level">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0 fw-bold">Password</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="password" value="<?php echo $row['password'];?>" class="form-control p-0 border-0" required> 
                                </div>
                            </div>   
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <!-- name mengacu pada array key, sedangkan value mengacu pada nilainya.-->
                                    <button class="btn btn-success" name="Submit" value="edit-user">Edit</button>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class>
                                    <!-- name mengacu pada array key, sedangkan value mengacu pada nilainya.-->
                                    <button class="btn btn-danger" name="Submit" value="delete-user">Delete</button>
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
