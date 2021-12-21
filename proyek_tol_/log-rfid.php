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
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar RFID</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="dashboard.php?menu=create-rfid" class="fw-normal">Tambah RFID</a></li>
                    </ol>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Menampilkan daftar RFID, sebagai berikut :</h3>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">No.</th>
                                    <th class="border-top-0">Nomor RFID</th>
                                    <th class="border-top-0">Nama Lengkap</th>
                                    <th class="border-top-0">Telepon</th>
                                    <th class="border-top-0">Saldo</th>
                                    <th class="border-top-0">Edit</th>
                                    <th class="border-top-0">Top-Up</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $datatampil = mysqli_query($koneksi, "SELECT * FROM tb_rfid ORDER BY id_rfid DESC");
                                    $no=1;
                                    if (is_array($datatampil) || is_object($datatampil)){
                                        foreach ($datatampil as $row){
                                            echo "<tr>
                                                    <td>$no</td>";
                                ?>
                                                <td><a href="dashboard.php?menu=detail-rfid&id_rfid=<?php echo $row['id_rfid']?>"><?php echo $row['nomor_rfid']?></a></td>
                                <?php
                                            echo "<td>".$row['nama_lengkap']."</td>
                                                    <td>".$row['telepon']."</td>
                                                    <td>". rupiah($row['saldo'])."</td>";
                                ?>
                                                    <td><a href="dashboard.php?page=edit-rfid&id_rfid=<?php echo $row['id_rfid']?>">Edit</a></td>
                                                    <td><a href="dashboard.php?page=edit-topup&id_rfid=<?php echo $row['id_rfid']?>">Top-Up</a></td>
                                <?php
                                            echo "</tr>";
                                            $no++;
                                            echo "</tr>";
                                        }  
                                    }
                                    mysqli_close($koneksi);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
</body>
</html>