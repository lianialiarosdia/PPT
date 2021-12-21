<?php 	

    $server       = ini_get("mysql.default_host"); 
    // $server    = "localhost";
    $user         = "root";
    $password     = "";
    $database     = "db_tol_delameta"; //Nama Database di phpMyAdmin

    $koneksi      = mysqli_connect($server, $user, $password, $database);

    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $box = [];
        while( $sql = mysqli_fetch_assoc($result)){
            $box[] = $sql;
        }
        return $box;
    }

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
    
    define("BASE_URL", "http://localhost/proyek_delameta/");

    function direct($url){
        echo "<script> window.location = 'url'; </script>";
    }
 ?>