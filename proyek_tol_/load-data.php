<?php
    include "koneksi.php";
    // Memulai Session 
    session_start();
    $status = $_SESSION['status'];

    if($_SESSION['status'] != "login"){
        header("location:index.php?page=login&pesan=belum_login");
    }

    $query_monitoring = "SELECT * FROM tb_monitoring";
    $row = query($query_monitoring)[0];

    $query_transaksi = "SELECT * FROM tb_transaksi_tol";
    $result_transaksi = mysqli_query($koneksi, $query_transaksi);
    $cek_transakasi = mysqli_num_rows($result_transaksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Nomor RFID</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="mx-auto"><span class="counter text-success fw-bold"><a href="dashboard.php?menu=detail-rfid&id_rfid=<?php echo $row['id_rfid']?>">
                        <?php echo $row['nomor_rfid']?></a></span>
                    </li>
                </ul>
            </div>  
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Nomor Transaksi</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="mx-auto"><span class="counter text-purple fw-bold"><a href="dashboard.php?menu=detail-transaksi&id_pembayaran=<?php echo $row['id_pembayaran']?>">
                        <?php echo $row['no_transaksi']?></a></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Status</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="mx-auto"><span class="counter text-success fw-bold">
                            <?php echo $row['keterangan']; ?></a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>