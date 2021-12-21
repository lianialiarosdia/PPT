<?php
    include "koneksi.php";

    if($_POST['Submit'] == "register") {
        $level = "user";
        $nama_lengkap = $_POST['nama_lengkap'];
        $nomor_rfid = $_POST['nomor_rfid'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];  
        $re_password = $_POST['re_password'];  
        
        // Mengecek apakah di dalam tb_user telah terdapat username yang sama, 
        // jika terdapat username yang sama data tidak akan dimasukkan dan kembali ke halaman register.
        $result_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username'");
        $cek_user = mysqli_num_rows($result_user);
        if($cek_user != 0){                                              
            // Mengambil id_rfid yang terdapat
            header("Location:index.php?page=register&pesan=username_reg");
        }
        elseif($password != $re_password){
            header("Location:index.php?page=register&pesan=password_reg");
        }
        else{
            // Mengambil id_rfid di tb_rfid 
            $result_rfid = query("SELECT * FROM tb_rfid WHERE nama_lengkap='$nama_lengkap' 
                                                                            AND nomor_rfid='$nomor_rfid'")[0];
            $id_rfid = $result_rfid['id_rfid'];
            // Mengecek apakah id_rfid sudah pernah digunakan sebelumnya
            $result_id = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_rfid='$id_rfid'");
            $cek_id = mysqli_num_rows($result_id);
            if($cek_id > 0){
                header("Location:index.php?page=register&pesan=rfid_reg");                  
            }
            else{
                // Memasukkan data ke dalam tb_user
                mysqli_query($koneksi, "INSERT INTO tb_user (id_rfid, password, username, level, email) VALUES 
                                                            ('$id_rfid', '$password', '$username', '$level', '$email')");
                
                header("Location:index.php?page=login&pesan=berhasil_register");	    
        }

        }
    }
?>