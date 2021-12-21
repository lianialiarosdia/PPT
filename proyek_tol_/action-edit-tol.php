<?php
    include "koneksi.php";

    if($_POST['Submit'] == "edit-tol") {
        $nama_golongan = $_POST['nama_golongan'];
        $tarif = $_POST['tarif'];  

        $id_tol = $_GET['id_tol'];
        $id_golongan = $_GET['id_golongan'];
 
        $query_tol = "UPDATE tb_golongan SET nama_golongan = '$nama_golongan', tarif = '$tarif'
                                                WHERE id_golongan = '$id_golongan'";
        $result = mysqli_query($koneksi, $query_tol);
        if(!$result){
            echo "gagal";
        }

        header("Location:dashboard.php?page=log-tol");

    }
    else if($_POST['Submit'] == "delete-tol") {
        $id_golongan = $_GET['id_golongan'];

        $query_tol = "DELETE FROM tb_golongan WHERE id_golongan = '$id_golongan'";
        $result = mysqli_query($koneksi, $query_tol);

        header("Location:dashboard.php?page=log-tol");
    }
?>