<?php
    include "koneksi.php";

    if($_POST['Submit'] == "edit-topup") {
        $nominal = $_POST['nominal'];
        $status = "Tunggu";
        $id_rfid = $_GET['id_rfid'];
        date_default_timezone_set('Asia/Jakarta');
        $tgl_topup = date("Y-m-d G:i:s");
        $tgl = date("YmdGis");
        $saldo = 0;
        $no_topup = "INVTOPUP$id_rfid$tgl";
 
        $query_user = "INSERT INTO tb_topup (nominal, status, id_rfid, no_topup, tanggal_topup, saldo_akhir)
                                VALUES ('".$nominal."', '".$status."', '".$id_rfid."', 
                                        '".$no_topup."', '".$tgl_topup."', '".$saldo."')";
        $result = mysqli_query($koneksi, $query_user);
        if(!$result){
            echo "gagal";
        }

        header("Location:dashboard.php?page=log-rfid");

    }
?>