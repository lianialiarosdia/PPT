<?php
    include "koneksi.php";

    if($_POST['Submit'] == "login") {
        $username = $_POST['username'];
        $password = $_POST['password'];  
        
        // Mengecek apakah di dalam tb_user terdapat username
        // jika terdapat username yang sama berarti data telah terdafar.
        $query_user = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
        $result_user = mysqli_query($koneksi, $query_user);
        $cek_user = mysqli_num_rows($result_user);
        if($cek_user > 0){  
        
            $result = query($query_user)[0];
            
            // Mengambil data dari tb_rfid dimanan id_rfid sama dengan username yang terdaftar
            $query_rfid = "SELECT * FROM tb_rfid WHERE id_rfid='$result[id_rfid]'";
            $result_rfid = query($query_rfid)[0];
       
            session_start();       
            $_SESSION['nama_lengkap'] = $result_rfid['nama_lengkap'];
            $_SESSION['id_rfid'] = $result['id_rfid'];
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";

            header("Location:dashboard.php?pesan=berhasil_login");
        }
        else{
            header("Location:index.php?page=login&pesan=username_login");
        }
    }
?>