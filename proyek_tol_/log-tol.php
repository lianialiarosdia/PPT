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
                <h4 class="page-title">Daftar Tol</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="dashboard.php?menu=create-tol" class="fw-normal">Tambah Tol</a></li>
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
                    <h3 class="box-title">Menampilkan daftar tol, sebagai berikut :</h3>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">No.</th>
                                    <th class="border-top-0">Nama Gerbang Tol</th>
                                    <th class="border-top-0">Golongan</th>
                                    <th class="border-top-0">Tarif</th>
                                    <th class="border-top-0">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Mengambil data dari tb_tol
                                    $query_tol = "SELECT * FROM tb_tol";        
                                    $result_tol = mysqli_query($koneksi, $query_tol);
                                    // $cek_tol = mysqli_num_rows($result_tol);
                                    // echo "Jumlah tol :$cek_tol"
                                    $nomor=1; 
                                    while($row = mysqli_fetch_assoc($result_tol)){
                                                                             
                                        // Mengecek jumlah golongan pada tiap tol
                                        $query_golongan = "SELECT * FROM tb_golongan WHERE id_tol='$row[id_tol]' ORDER BY tarif ASC";
                                        $result_golongan = mysqli_query($koneksi, $query_golongan);
                                        $cek_golongan = mysqli_num_rows($result_golongan);
                                        if($cek_golongan != 0){
                                ?>
                                            <tr>
                                                            <td rowspan="<?php echo $cek_golongan ?>"><?php echo $nomor ?></td>
                                                            <td rowspan="<?php echo $cek_golongan ?>">
                                                                <a href="dashboard.php?menu=detail-tol&id_tol=<?php echo $row['id_tol']?>"><?php echo $row['nama_tol'] ?></a>
                                                            </td>
                                <?php
                                            $golongan = $cek_golongan;
                                            while($row_golongan = mysqli_fetch_assoc($result_golongan)){
                                            
                                                if($golongan == $cek_golongan){
                                                    echo "<td>".$row_golongan['nama_golongan']."</td>
                                                            <td>".rupiah($row_golongan['tarif'])."</td>";
                                ?>
                                                            <td><a href="dashboard.php?page=edit-tol&id_golongan=<?php echo $row_golongan['id_golongan']?>&id_tol=<?php echo $row_golongan['id_tol']?>">Edit</a></td>
                                <?php
                                                    echo "</tr>";
                                                }
                                                else{
                                                    echo "<tr>
                                                            <td>".$row_golongan['nama_golongan']."</td>
                                                            <td>".rupiah($row_golongan['tarif'])."</td>";
                                ?>
                                                            <td><a href="dashboard.php?page=edit-tol&id_golongan=<?php echo $row_golongan['id_golongan']?>&id_tol=<?php echo $row_golongan['id_tol']?>">Edit</a></td>
                                <?php
                                                    echo "</tr>";
                                                }  
                                                $golongan++;
                                            }
                                            $nomor++;
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