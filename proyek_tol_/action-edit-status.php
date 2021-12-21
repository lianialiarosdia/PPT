<?php
    include "koneksi.php";

    if($_POST['Submit'] == "edit-status") {
        $status = $_POST['status'];  
        $id_topup = $_GET['id_topup'];
        $total = 0;

        if($status == "Berhasil"){
            $query_topup = "SELECT * FROM tb_topup WHERE id_topup = '$id_topup'";
            $row_topup = query($query_topup)[0];
            // echo "$row_topup[id_rfid]";
            //echo "$row_topup[nominal]";
            
            $query_rfid = "SELECT * FROM tb_rfid WHERE id_rfid= '$row_topup[id_rfid]'";
            $row_rfid = query($query_rfid)[0];
            $total = $row_rfid['saldo'] + $row_topup['nominal'];
            echo $total;

            $query = "UPDATE tb_rfid SET saldo = '$total' WHERE id_rfid='$row_topup[id_rfid]'";
            $result = mysqli_query($koneksi, $query);
        }
 
        $query_user = "UPDATE tb_topup SET status = '$status', saldo_akhir = '$total' WHERE id_topup = '$id_topup'";
        $result = mysqli_query($koneksi, $query_user);

        header("Location:dashboard.php?page=log-topup");

    }
?>