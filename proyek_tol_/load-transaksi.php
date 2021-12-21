<?php
    include "koneksi.php";
    $query_transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi_tol");
    $cek = mysqli_num_rows($query_transaksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

        <div class="white-box analytics-info">
            <h3 class="box-title">Jumlah Transaksi</h3>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li class="mx-auto"><span class="counter text-info fw-bold"><?php echo $cek; ?></span>
                </li>
            </ul>
        </div>  
</body>
</html>