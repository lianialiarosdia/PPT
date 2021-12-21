<?php
    include "koneksi.php";

    if($_POST['Submit'] == "edit-rfid") {
        $nama_lengkap = $_POST['nama_lengkap'];
        $nomor_rfid = $_POST['nomor_rfid'];  
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        $id_rfid = $_GET['id_rfid'];
 
        $query_user = "UPDATE tb_rfid SET nama_lengkap = '$nama_lengkap', nomor_rfid = '$nomor_rfid', 
                                                alamat ='$alamat', telepon = '$telepon' 
                                                WHERE id_rfid = '$id_rfid'";
        $result = mysqli_query($koneksi, $query_user);

        header("Location:dashboard.php?page=log-rfid");

    }
    else if($_POST['Submit'] == "delete-rfid") {
        $id_rfid= $_GET['id_rfid'];

        $query_rfid = "DELETE FROM tb_rfid WHERE id_rfid = '$id_rfid'";
        $result = mysqli_query($koneksi, $query_rfid);

        header("Location:dashboard.php?page=log-rfid");
    }
?>