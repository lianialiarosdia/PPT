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
                <h4 class="page-title">Log Transaksi Tol</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="dashboard.php" class="fw-normal">Dashboard</a></li>
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
                    <h3 class="box-title">Menampilkan log transaksi tol, sebagai berikut :</h3>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">No.</th>
                                    <th class="border-top-0">Nomor RFID</th>
                                    <th class="border-top-0">Nomor Transaksi</th>
                                    <th class="border-top-0">Tanggal Transaksi</th>
                                    <th class="border-top-0">Saldo Akhir</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $datatampil = mysqli_query($koneksi, "SELECT * FROM tb_transaksi_tol ORDER BY id_pembayaran DESC");
                                    $no=1;
                                    if (is_array($datatampil) || is_object($datatampil)){
                                        foreach ($datatampil as $row){
                                            echo "<tr>
                                                    <td>$no</td>";
                                                
                                            // Mencocokan id_rfid pada tb_transaksi dengan id_rfid pada tb_rfid
                                            $query_rfid = "SELECT * FROM tb_rfid WHERE id_rfid='$row[id_rfid]'";
                                            $result = query($query_rfid)[0];
                                ?>
                                                    <td><a href="dashboard.php?menu=detail-rfid&id_rfid=<?php echo $result['id_rfid']?>"><?php echo $result['nomor_rfid'] ?></a></td>
                                                    <td><a href="dashboard.php?menu=detail-transaksi&id_pembayaran=<?php echo $row['id_pembayaran']?>"><?php echo $row['no_transaksi'] ?></a></td>
                                <?php
                                            // echo "<td>".$row['no_transaksi']."</td>
                                            echo "<td>".$row['tanggal_transaksi']."</td>
                                                    <td>".rupiah($row['saldo_akhir'])."</td>
                                                    <td>".$row['status']."</td>
                                                </tr>";
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